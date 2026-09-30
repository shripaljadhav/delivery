# Legal & compliance notes — hospital sales (India)

Operational checklist for founders. **Not a substitute for lawyer/CA advice.** Have templates reviewed once, then reuse.

## Before first paid healthcare client

- [ ] Company: Pvt Ltd active (Drogenide Softwares Pvt. Ltd. / trading as Nextera Digital Tech)
- [ ] GSTIN on invoices
- [ ] Letterhead + signatory authority
- [ ] Bank account for kickoff + AMC
- [ ] MSA + SoW + NDA templates (lawyer-reviewed)
- [ ] Privacy Policy + Terms on https://nexteradigitaltech.in (already present — keep aligned with product claims)
- [ ] Demo environments use **synthetic patient data only**

## How to position products (safe language)

| Say | Avoid |
|---|---|
| Hospital / clinic management platform | “Uber for doctors”, brand-clone names |
| White-label software under your brand | “Government certified HMS” (unless true) |
| Helps staff manage appointments & billing | “Diagnoses patients” / “replaces doctor” |
| Client is data fiduciary for patient data | Implying Nextera is clinically liable |
| Platform supports records & workflows | Guaranteeing insurance claim approval |

## Contracts — minimum clauses

1. **Scope & exclusions** (mirror proposal §3–4)  
2. **Payment milestones** + late fee / pause-on-nonpayment  
3. **IP:** product framework vs client data vs custom code  
4. **Data protection:** client instructions; DPDP-aligned processing; breach notify window  
5. **Uptime / support SLA** in AMC schedule  
6. **Limitation of liability** (cap at fees paid)  
7. **No clinical advice warranty**  
8. **Termination & data export** on exit  

## Healthcare-specific cautions

- **Patient data:** Treat as sensitive personal data. Prefer client-controlled payment/SMS KYC. Limit Nextera staff access to production.  
- **Telemedicine:** If client offers teleconsult, clinical/legal compliance is **client’s**; you supply software.  
- **Drugs / controlled substances:** Pharmacy module is inventory/billing aid — not a substitute for licensed pharmacy systems where mandated.  
- **ABDM / ABHA:** Do not promise national health stack integration unless you have a scoped, tested plan.  
- **Case studies:** Prefer anonymized metrics; get written consent before naming a hospital.

## Demo & sales hygiene

- Rotate demo passwords quarterly; never reuse production passwords.  
- Watermark demos: `DEMO — NOT FOR CLINICAL USE`.  
- Do not store prospect patient samples in personal WhatsApp.  
- Keep a copy of every signed proposal / MSA in company drive.

## MediCore

Do not sell or demo MediCore until the live environment is stable (currently HTTP 500). Selling a broken demo damages trust more than having one fewer product.

## When to pause a deal

- Client demands “store patient data on personal laptop” with no controls  
- Client asks you to forge compliance certificates  
- Scope is full hospital ERP + LIS + TPA in 3 weeks at Starter price  

Escalate to written change request or walk away.
