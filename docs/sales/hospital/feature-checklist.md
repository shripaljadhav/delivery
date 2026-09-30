# Hospital / clinic feature checklist (discovery)

Use on the call. Mark **Must** / **Nice** / **Out** for this prospect.  
Score: if &gt;70% Must map to product → strong fit. If many Must are Out → custom project, not product sale.

Prospect: _______________________ Date: ________ Product lean: ☐ CareDesk ☐ HospitalOS ☐ Both

## A. Front desk & patients

| Feature | CareDesk | HospitalOS | Prospect need (M/N/O) | Notes |
|---|---|---|---|---|
| Patient registration / UHID | Yes | Yes | | |
| Appointment booking (reception) | Yes | Yes | | |
| Online / patient self-booking | Yes | Partial / config | | |
| Queue / token / waitlist | Yes | Yes | | |
| SMS / WhatsApp reminders | Config / integrate | Config / integrate | | |
| Multi-doctor schedule | Yes | Yes | | |
| Multi-branch / multi-hospital | Multi-clinic | Multi-hospital SaaS | | |

## B. Clinical

| Feature | CareDesk | HospitalOS | Prospect need (M/N/O) | Notes |
|---|---|---|---|---|
| Doctor encounter notes | Yes | Yes | | |
| Digital prescription | Yes | Yes | | |
| Vitals / EMR documents | Yes | Yes | | |
| IPD / ward / bed management | No / limited | Yes | | |
| Nursing charts | No / limited | Yes | | |
| OT / surgery module | Out / custom | Check / custom | | |
| Teleconsult | App path | Custom | | |

## C. Pharmacy, lab, diagnostics

| Feature | CareDesk | HospitalOS | Prospect need (M/N/O) | Notes |
|---|---|---|---|---|
| Pharmacy stock & billing | Limited / custom | Yes | | |
| Lab orders & results | Limited / custom | Yes | | |
| External LIS integration | Custom | Custom | | |
| Diagnostic centre multi-test billing | Partial | Yes | | |

## D. Billing & finance

| Feature | CareDesk | HospitalOS | Prospect need (M/N/O) | Notes |
|---|---|---|---|---|
| OPD / service invoicing | Yes | Yes | | |
| Advance / deposit | Check | Yes | | |
| Insurance / TPA claims | Hook / custom | Hook / custom | | |
| GST invoices | Config | Config | | |
| Payment gateway (Razorpay etc.) | Yes / config | Config | | |
| Daily collection reports | Yes | Yes | | |
| Accounting export (Tally) | Custom | Custom | | |

## E. Admin, security, apps

| Feature | CareDesk | HospitalOS | Prospect need (M/N/O) | Notes |
|---|---|---|---|---|
| Role-based access | Yes | Yes | | |
| Audit-friendly records | Yes | Yes | | |
| Patient mobile app | Yes (Flutter) | Roadmap / custom | | |
| Staff mobile app | Yes (Flutter) | Roadmap / custom | | |
| White-label branding | Yes | Yes | | |
| On-prem vs cloud | Prefer cloud | Prefer cloud | | |
| Hindi UI | Custom | Custom | | |

## Qualification questions (ask every time)

1. Beds / IPD? If yes → **HospitalOS**. If pure OPD clinic → **CareDesk**.
2. How many doctors, receptionists, branches?
3. Current system (paper / Excel / other HMS)? Why switching?
4. Must-have integrations (WhatsApp, lab machine, TPA, Tally)?
5. Who signs and who uses daily? (owner vs admin vs doctors)
6. Budget band comfortable? Soft ask after pain is clear.
7. Go-live urgency (30 / 60 / 90 days)?

## Fit decision

- ☐ **Product fit** — map Must → package, book proposal  
- ☐ **Product + light custom** — list customs with hours  
- ☐ **Heavy custom / RFP** — do not underprice; discovery workshop  
- ☐ **No fit** — polite close; ask for referral  

## Demo credentials (internal)

**HospitalOS**  
- Super admin: https://nexteradigitaltech.in/demos-live/hospitalos/auth/login — `admin@nexteradigitaltech.in` / `HospitalOS@2026`  
- Tenant: `admin@hms.com` / `12345`

**CareDesk**  
- Admin: https://nexteradigitaltech.in/demos-live/caredesk/admin/login — `admin@nexteradigitaltech.in` / `CareDesk@2026`  
- Seeds: `admin@kivicare.com` · `demo@kivicare.com` / `12345678`
