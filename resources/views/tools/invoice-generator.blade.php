@extends('public.layouts.app')

@section('title', 'Invoice Generator — i2Medier')

@push('page_css')
    @vite('resources/css/public/pages/tools.css')
@endpush

@section('content')
    @component('tools.partials.tool-page', ['tool' => $tool, 'relatedTools' => $relatedTools])
        <div x-data="invoiceGenerator()">
            <div class="tool-form tool-form--two-col">
                <label>
                    From — Business name
                    <input x-model="from.name" type="text" placeholder="Your business name">
                </label>
                <label>
                    To — Client name
                    <input x-model="to.name" type="text" placeholder="Client name">
                </label>
                <label>
                    From — Email
                    <input x-model="from.email" type="email" placeholder="you@example.com">
                </label>
                <label>
                    To — Email
                    <input x-model="to.email" type="email" placeholder="client@example.com">
                </label>
                <label>
                    From — Address
                    <textarea x-model="from.address" rows="2" placeholder="Your address"></textarea>
                </label>
                <label>
                    To — Address
                    <textarea x-model="to.address" rows="2" placeholder="Client address"></textarea>
                </label>
                <label>
                    Invoice number
                    <input x-model="invoiceNumber" type="text" placeholder="INV-001">
                </label>
                <label>
                    Invoice date
                    <input x-model="invoiceDate" type="date">
                </label>
                <label class="tool-form__full">
                    Due date
                    <input x-model="dueDate" type="date">
                </label>
            </div>

            <div class="tool-line-items">
                <h3>Line items</h3>
                <template x-for="(item, i) in items" :key="i">
                    <div class="tool-line-item">
                        <input x-model="item.description" type="text" placeholder="Description">
                        <input x-model.number="item.qty" type="number" min="1" placeholder="Qty">
                        <input x-model.number="item.price" type="number" min="0" placeholder="Unit price (₦)">
                        <button @click="removeItem(i)" type="button" class="tool-line-item__remove">×</button>
                    </div>
                </template>
                <button @click="addItem()" type="button" class="tools-button">+ Add line item</button>
            </div>

            <div class="tool-form">
                <label>
                    Tax
                    <select x-model="taxType">
                        <option value="none">No tax</option>
                        <option value="vat">VAT 7.5%</option>
                        <option value="custom">Custom %</option>
                    </select>
                </label>
                <template x-if="taxType === 'custom'">
                    <label>
                        Custom tax %
                        <input x-model.number="customTax" type="number" min="0" max="100" placeholder="0">
                    </label>
                </template>
                <label>
                    Notes / payment terms
                    <textarea x-model="notes" rows="2" placeholder="e.g. Payment due within 7 days."></textarea>
                </label>
            </div>

            <div class="tool-result" id="invoice-preview">
                <div class="tool-invoice">
                    <div class="tool-invoice__header">
                        <div>
                            <strong x-text="from.name || 'Your Business'"></strong>
                            <span x-text="from.email"></span>
                            <span x-text="from.address"></span>
                        </div>
                        <div class="tool-invoice__meta">
                            <strong>INVOICE</strong>
                            <span>No. <span x-text="invoiceNumber || 'INV-001'"></span></span>
                            <span>Date: <span x-text="invoiceDate || '—'"></span></span>
                            <span>Due: <span x-text="dueDate || '—'"></span></span>
                        </div>
                    </div>
                    <div class="tool-invoice__to">
                        <strong>Bill to:</strong>
                        <span x-text="to.name || 'Client'"></span>
                        <span x-text="to.email"></span>
                        <span x-text="to.address"></span>
                    </div>
                    <table class="tool-invoice__table">
                        <thead>
                            <tr><th>Description</th><th>Qty</th><th>Unit price</th><th>Amount</th></tr>
                        </thead>
                        <tbody>
                            <template x-for="(item, i) in items" :key="i">
                                <tr>
                                    <td x-text="item.description || '—'"></td>
                                    <td x-text="item.qty"></td>
                                    <td x-text="'₦' + Number(item.price).toLocaleString()"></td>
                                    <td x-text="'₦' + (item.qty * item.price).toLocaleString()"></td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                    <div class="tool-invoice__totals">
                        <div>Subtotal: <strong x-text="'₦' + subtotal().toLocaleString()"></strong></div>
                        <template x-if="taxType !== 'none'">
                            <div>Tax (<span x-text="taxRate()"></span>%): <strong x-text="'₦' + taxAmount().toLocaleString()"></strong></div>
                        </template>
                        <div class="tool-invoice__total-line">Total: <strong x-text="'₦' + total().toLocaleString()"></strong></div>
                    </div>
                    <template x-if="notes">
                        <div class="tool-invoice__notes">
                            <strong>Notes:</strong>
                            <p x-text="notes"></p>
                        </div>
                    </template>
                </div>
            </div>

            <button @click="printInvoice()" type="button" class="tools-button tools-button--dark">Download / Print PDF</button>
        </div>
    @endcomponent
@endsection

@push('scripts')
    @vite('resources/js/public/pages/tool-invoice-generator.js')
@endpush
