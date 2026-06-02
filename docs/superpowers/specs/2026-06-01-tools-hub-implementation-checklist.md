## Tools Hub Implementation Checklist

Source spec: [2026-06-01-tools-hub-design.md](./2026-06-01-tools-hub-design.md)

### Current Status

- [x] Approved design spec exists
- [ ] Public `/tools` routes
- [ ] `ToolController`
- [ ] Hub page at `resources/views/tools/hub.blade.php`
- [ ] Individual tool Blade pages
- [ ] Shared tool page CSS entry
- [ ] `tool_leads` table migration
- [ ] `ToolLead` model
- [ ] `POST /tools/leads` storage endpoint
- [ ] Livewire component classes for server-side tools
- [ ] Livewire component views
- [ ] SEO Audit logic
- [ ] Website Cost Calculator logic
- [ ] Business Name Generator logic
- [ ] Domain Name Generator logic
- [ ] Website Brief Generator logic
- [ ] WhatsApp Link Generator logic
- [ ] Invoice Generator logic
- [ ] Blur gate / email unlock flow
- [ ] Related tools blocks
- [ ] Print styles for brief and invoice tools
- [ ] QR code load for WhatsApp tool

### First Build Slice

- [x] Create routes and controller scaffold
- [x] Create hub page and tool page shells
- [x] Create shared `tools.css` and register it in Vite
- [x] Create `ToolLead` model and migration
- [x] Add `storeLead` endpoint with server-side email validation
- [x] Create Livewire directory structure stubs

### Remaining After First Slice

- [ ] Wire Livewire into the public layout for server-side tools
- [ ] Build actual tool interactions
- [ ] Add blur-gated result states
- [ ] Add request-level protection and UX polish
