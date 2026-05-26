<?php

namespace App\Http\Controllers;

use App\Models\AffiliateProfile;
use App\Models\Document;
use App\Models\Invoice;
use App\Models\Service;
use App\Models\ServiceSubscription;
use App\Models\SupportTicket;
use App\Models\Website;
use App\Models\WebsitePackage;
use App\Support\PaymentSettings;
use Illuminate\Contracts\View\View;

class PortalController extends Controller
{
    public function dashboard(): View
    {
        $user = request()->user();
        $websites = $this->visibleWebsites();
        $tickets = $this->visibleTickets();
        $openInvoices = $this->clientInvoices()->whereNotIn('status', ['paid', 'cancelled', 'refunded'])->get();
        $subscriptions = $this->clientSubscriptions()->with('service', 'website')->get();
        $documents = $this->clientDocuments()->latest()->limit(5)->get();

        return view('portal.dashboard', [
            'user' => $user,
            'pageTitle' => 'Dashboard',
            'pageDescription' => "Here's what's happening with your account today.",
            'pageCss' => 'dashboard.css',
            'activeProjects' => $websites->count(),
            'pendingInvoices' => $openInvoices->count(),
            'activeSubscriptions' => $subscriptions->where('status', 'active')->count(),
            'openTickets' => $tickets->whereNotIn('status', ['resolved', 'closed'])->count(),
            'projects' => $websites->take(3),
            'recentInvoices' => $openInvoices->sortBy('due_at')->take(4),
            'recentTickets' => $tickets->sortByDesc('created_at')->take(4),
            'recentDocuments' => $documents,
        ]);
    }

    public function projects(): View
    {
        $projects = $this->visibleWebsites();

        return view('portal.projects', [
            'user' => request()->user(),
            'pageTitle' => 'Projects',
            'pageDescription' => 'Projects',
            'pageCss' => 'projects.css',
            'projects' => $projects,
            'totalProjects' => $projects->count(),
            'activeProjects' => $projects->where('health_state', 'active')->count(),
            'pendingProjects' => $projects->where('health_state', 'pending_setup')->count(),
            'atRiskProjects' => $projects->where('health_state', 'at_risk')->count(),
        ]);
    }

    public function services(): View
    {
        $subscriptions = $this->clientSubscriptions()->with('service', 'website')->get();
        $services = Service::query()->active()->orderBy('sort_order')->get();
        $packages = WebsitePackage::query()->where('is_active', true)->orderByDesc('is_featured')->orderBy('sort_order')->get();

        return view('portal.services', [
            'user' => request()->user(),
            'pageTitle' => 'Services',
            'pageDescription' => 'Services',
            'pageCss' => 'services.css',
            'subscriptions' => $subscriptions,
            'services' => $services,
            'packages' => $packages,
            'activeServicesCount' => $subscriptions->where('status', 'active')->count(),
            'expiringSoonCount' => $subscriptions->filter(fn ($subscription) => $subscription->expires_at?->isBetween(now(), now()->addDays(30)))->count(),
            'catalogCount' => $services->count(),
        ]);
    }

    public function domains(): View
    {
        $domains = $this->visibleWebsites()->filter(fn ($website) => filled($website->primary_domain))->values();

        return view('portal.domains', [
            'user' => request()->user(),
            'pageTitle' => 'Domains',
            'pageDescription' => 'Domains',
            'pageCss' => 'domains.css',
            'domains' => $domains,
            'totalDomains' => $domains->count(),
            'activeDomains' => $domains->where('domain_status', 'active')->count(),
            'expiringDomains' => $domains->where('domain_status', 'expiring')->count(),
        ]);
    }

    public function hosting(): View
    {
        $hosting = $this->visibleWebsites()->filter(
            fn ($website) => filled($website->hosting_provider) || filled($website->hosting_status) || filled($website->hosting_expiry_date)
        )->values();

        return view('portal.hosting', [
            'user' => request()->user(),
            'pageTitle' => 'Hosting',
            'pageDescription' => 'Hosting',
            'pageCss' => 'hosting.css',
            'hostingRecords' => $hosting,
            'totalHosting' => $hosting->count(),
            'activeHosting' => $hosting->where('hosting_status', 'active')->count(),
            'expiringHosting' => $hosting->where('hosting_status', 'expiring')->count(),
        ]);
    }

    public function invoices(): View
    {
        $invoices = $this->clientInvoices()->with('website', 'payments')->latest('issued_at')->get();
        $outstanding = $invoices->whereNotIn('status', ['paid', 'cancelled', 'refunded']);
        $recentPayment = $invoices->flatMap->payments->sortByDesc('paid_at')->first();

        return view('portal.invoices', [
            'user' => request()->user(),
            'pageTitle' => 'Invoices',
            'pageDescription' => 'Invoices',
            'pageCss' => 'invoices.css',
            'invoices' => $invoices,
            'outstandingBalance' => (float) $outstanding->sum('total'),
            'pendingCount' => $outstanding->count(),
            'paidCount' => $invoices->where('status', 'paid')->count(),
            'recentPayment' => $recentPayment,
        ]);
    }

    public function invoice(Invoice $invoice): View
    {
        abort_unless($invoice->client_id === request()->user()?->client_id, 403);

        return view('portal.invoice-show', [
            'user' => request()->user(),
            'pageTitle' => 'Invoice',
            'pageDescription' => $invoice->invoice_number,
            'pageCss' => 'invoices.css',
            'invoice' => $invoice->load('website', 'items', 'payments'),
            'paymentSettings' => app(PaymentSettings::class),
        ]);
    }

    public function billing(): View
    {
        $settings = app(PaymentSettings::class);
        $invoices = $this->clientInvoices()->with('website', 'payments')->latest('issued_at')->get();
        $payments = $invoices->flatMap->payments->sortByDesc('created_at')->values();
        $outstanding = $invoices->whereNotIn('status', ['paid', 'cancelled', 'refunded']);

        return view('portal.billing', [
            'user' => request()->user(),
            'pageTitle' => 'Billing',
            'pageDescription' => 'Billing',
            'pageCss' => 'billing.css',
            'invoices' => $invoices,
            'payments' => $payments,
            'outstandingInvoices' => $outstanding->take(4),
            'outstandingBalance' => (float) $outstanding->sum('total'),
            'paidThisMonth' => (float) $payments->where('status', 'paid')->filter(fn ($payment) => $payment->paid_at?->isCurrentMonth())->sum('amount'),
            'paymentOptions' => [
                [
                    'label' => 'Paystack',
                    'detail' => $settings->paystackEnabled() ? 'Online checkout enabled' : 'Unavailable',
                    'enabled' => $settings->paystackEnabled(),
                ],
                [
                    'label' => 'Bank Transfer',
                    'detail' => $settings->bankTransferEnabled() ? ($settings->bankTransferDetails()['bank_name'] ?: 'Manual transfer enabled') : 'Unavailable',
                    'enabled' => $settings->bankTransferEnabled(),
                ],
            ],
        ]);
    }

    public function subscriptions(): View
    {
        $subscriptions = $this->clientSubscriptions()->with('service', 'website')->latest()->get();

        return view('portal.subscriptions', [
            'user' => request()->user(),
            'pageTitle' => 'Subscriptions',
            'pageDescription' => 'Subscriptions',
            'pageCss' => 'subscription.css',
            'subscriptions' => $subscriptions,
            'totalSubscriptions' => $subscriptions->count(),
            'activeSubscriptions' => $subscriptions->where('status', 'active')->count(),
            'expiringSoonCount' => $subscriptions->filter(fn ($subscription) => $subscription->expires_at?->isBetween(now(), now()->addDays(60)))->count(),
        ]);
    }

    public function tickets(): View
    {
        $tickets = $this->visibleTickets();

        return view('portal.tickets', [
            'user' => request()->user(),
            'pageTitle' => 'Support Tickets',
            'pageDescription' => 'Support Tickets',
            'pageCss' => 'ticket.css',
            'tickets' => $tickets->sortByDesc('created_at')->values(),
            'openCount' => $tickets->where('status', 'open')->count(),
            'inProgressCount' => $tickets->where('status', 'in_progress')->count(),
            'waitingReplyCount' => $tickets->where('status', 'waiting_reply')->count(),
            'closedCount' => $tickets->where('status', 'closed')->count(),
            'resolvedCount' => $tickets->where('status', 'resolved')->count(),
        ]);
    }

    public function documents(): View
    {
        $documents = $this->clientDocuments()->with('website')->latest()->get();
        $storageUsed = (int) $documents->sum('size');

        return view('portal.documents', [
            'user' => request()->user(),
            'pageTitle' => 'My Documents',
            'pageDescription' => 'My Documents',
            'pageCss' => 'documents.css',
            'documents' => $documents,
            'storageUsed' => $storageUsed,
            'storageAvailable' => max(0, (10 * 1024 * 1024 * 1024) - $storageUsed),
            'fileTypeCounts' => [
                'PDF Documents' => $documents->filter(fn ($document) => $document->extension === 'pdf')->count(),
                'Word Documents' => $documents->filter(fn ($document) => in_array($document->extension, ['doc', 'docx'], true))->count(),
                'Excel Sheets' => $documents->filter(fn ($document) => in_array($document->extension, ['xls', 'xlsx', 'csv'], true))->count(),
                'Images' => $documents->filter(fn ($document) => in_array($document->extension, ['png', 'jpg', 'jpeg', 'gif', 'webp'], true))->count(),
            ],
        ]);
    }

    public function affiliate(): View
    {
        $profile = AffiliateProfile::query()->with('referrals')->where('user_id', request()->user()->id)->first();
        $referrals = $profile?->referrals?->sortByDesc('referred_at')->values() ?? collect();

        return view('portal.affiliate', [
            'user' => request()->user(),
            'pageTitle' => 'My Affiliate',
            'pageDescription' => 'My Affiliate',
            'pageCss' => 'affiliate.css',
            'profile' => $profile,
            'referrals' => $referrals,
            'totalReferrals' => $referrals->count(),
            'totalCommission' => (float) $referrals->sum('commission_amount'),
            'paidCommission' => (float) $referrals->where('status', 'paid')->sum('commission_amount'),
            'pendingCommission' => (float) $referrals->where('status', 'pending')->sum('commission_amount'),
            'affiliateLink' => $profile ? rtrim(config('app.url'), '/') . '/?ref=' . $profile->referral_code : null,
        ]);
    }

    public function profile(): View
    {
        $user = request()->user();
        $client = $user->client;
        $preferences = $user->notification_preferences ?? [];

        return view('portal.profile', [
            'user' => $user,
            'client' => $client,
            'preferences' => $preferences,
            'pageTitle' => 'Profile & Settings',
            'pageDescription' => 'Profile & Settings',
            'pageCss' => 'profile.css',
            'profileCompletion' => $this->profileCompletion($user),
        ]);
    }

    protected function visibleWebsites()
    {
        $user = request()->user();

        $query = Website::query()->with(['package', 'serviceSubscriptions.service', 'onboardingTasks'])->where('client_id', $user?->client_id);

        if ($user?->isClientMember()) {
            $query->whereIn('id', $user->assignedWebsites()->pluck('websites.id'));
        }

        return $query->get();
    }

    protected function visibleTickets()
    {
        $user = request()->user();

        $query = SupportTicket::query()->with(['website', 'assignee'])->where('client_id', $user?->client_id);

        if ($user?->isClientMember()) {
            $query->where('submitted_by', $user->id);
        }

        return $query->get();
    }

    protected function clientInvoices()
    {
        return Invoice::query()->where('client_id', request()->user()?->client_id);
    }

    protected function clientSubscriptions()
    {
        return ServiceSubscription::query()->where('client_id', request()->user()?->client_id);
    }

    protected function clientDocuments()
    {
        $user = request()->user();

        $query = Document::query()->where('client_id', $user?->client_id)->where('visibility', 'client');

        if ($user?->isClientMember()) {
            $query->where(function ($documentQuery) use ($user): void {
                $documentQuery->whereNull('website_id')->orWhereIn('website_id', $user->assignedWebsites()->pluck('websites.id'));
            });
        }

        return $query;
    }

    protected function profileCompletion($user): int
    {
        $fields = [
            $user->name,
            $user->email,
            $user->phone,
            $user->avatar,
            $user->client?->company_name,
            $user->client?->email,
            $user->client?->address,
            $user->client?->country,
        ];

        $completed = collect($fields)->filter(fn ($value) => filled($value))->count();

        return (int) round(($completed / count($fields)) * 100);
    }
}
