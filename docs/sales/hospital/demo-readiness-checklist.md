# Hospital demo readiness checklist

Run this **every morning** before outreach. Do not book demos if any “Must” item fails.

## Must (block outreach if fail)

- [ ] HospitalOS login page loads: https://nexteradigitaltech.in/demos-live/hospitalos/auth/login
- [ ] HospitalOS super admin login works: `admin@nexteradigitaltech.in` / `HospitalOS@2026`
- [ ] HospitalOS tenant admin works: `admin@hms.com` / `12345`
- [ ] CareDesk admin login works: https://nexteradigitaltech.in/demos-live/caredesk/admin/login — `admin@nexteradigitaltech.in` / `CareDesk@2026`
- [ ] CareDesk seed roles work: `admin@kivicare.com` / `demo@kivicare.com` — password `12345678`
- [ ] Demo data shows patients, appointments/OPD, billing screens (not empty DB)
- [ ] Product pages load:
  - https://nexteradigitaltech.in/demos/hospitalos/
  - https://nexteradigitaltech.in/demos/caredesk/
- [ ] MediCore is **not** linked or pitched (currently HTTP 500)
- [ ] WhatsApp CTA works: https://wa.me/919834162696
- [ ] Company GST / bank details ready for proposal (internal file)

## Should (same week)

- [ ] Demo watermark / “DEMO ENVIRONMENT” visible
- [ ] Passwords rotated or confirmed still valid
- [ ] Screen-record backup video (unlisted YouTube) if live demo fails mid-call
- [ ] Mobile responsive check on CareDesk patient booking view
- [ ] One anonymized case story ready (hospital + clinic)

## Nice (before scale)

- [ ] Dedicated demo hospital branded lightly as “Nextera Demo Hospital” (not client names)
- [ ] APK / TestFlight for CareDesk patient + staff apps
- [ ] Hindi + English one-pager PDF exported from `one-pager.md`
- [ ] Razorpay test mode receipt flow in CareDesk billing demo

## Status snapshot (as of site audit)

| Asset | Status |
|---|---|
| HospitalOS live demo | Ready |
| CareDesk live demo | Ready |
| MediCore live demo | Broken — hide from pitches |
| Feature PDF / proposal | Use templates in this folder |
| Mobile app store links | Prepare before promising “app live on stores” |

## If demo breaks during a call

1. Switch to backup screen recording.
2. Share product page + reschedule 15-min “live walkthrough”.
3. Log the failure; do not invent excuses about “their network”.
