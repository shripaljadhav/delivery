# Tools stack & automation map

Cost-conscious solo stack. Prefer free tiers until ₹5L collected.

---

## Core stack (install week 1)

| Job | Tool | Cost | Notes |
|---|---|---|---|
| CRM / pipeline | **Google Sheets** + [`pipeline-4-verticals.csv`](./pipeline-4-verticals.csv) | Free | Later HubSpot free / Bitrix24 |
| Calling | Phone + Truecaller | — | Save as “Nextera” |
| Chat sales | **WhatsApp Business** app | Free | Catalogs + quick replies |
| Video demos | **Google Meet** (or Zoom free) | Free | Record with consent |
| Docs / proposals | Google Docs → PDF | Free | Templates in each vertical |
| E-sign (optional) | Leegality / Digio / Adobe free trial | Low | Or signed PDF + WhatsApp “Accepted” |
| Invoicing | ClearTax / Zoho Invoice / Excel+GST | Low | GST compliant |
| File store | Google Drive folder per client | Free | `Client/Proposal/MSA/Assets` |
| Lists | Google Maps + [Maps scraper ethical manual] or Outscraper later | Free→paid | Start **manual** copy |
| India leads | **IndiaMART** seller | Free→paid leads | Highest intent |
| Secondary | TradeIndia, Justdial | Free | |
| LinkedIn | LinkedIn free → Sales Nav later | Free→₹ | |
| Ads (week 3+) | Meta Ads Manager | Spend ₹300–500/day test | Clinic/restaurant only first |
| Email (optional) | Gmail + mail merge (Yet Another Mail Merge) | Free | WA beats email for SMB India |
| Password / demos | Bitwarden | Free | Demo logins shared securely |
| Screen record backup | Loom / OBS | Free | If live demo dies |
| AI | ChatGPT / Claude / Cursor | Sub you already use | See automation matrix |
| Website | nexteradigitaltech.in | Live | Keep demos healthy |
| Calendar | Google Calendar | Free | Demo slots Tue–Fri 14:00–16:00 |

---

## Quick-reply library (WhatsApp Business)

Save these as labels:

1. `intro-clinic`  
2. `intro-hospital`  
3. `intro-school`  
4. `intro-restaurant`  
5. `demo-link`  
6. `followup-2`  
7. `followup-5`  
8. `proposal-sent`  
9. `payment-link`  
10. `not-now`

---

## Automation matrix

| Task | Automate? | How | Human must… |
|---|---|---|---|
| Build lead lists from Maps | **Semi** | AI drafts search queries; you/VA paste into sheet | Verify phone is owner/admin |
| First WhatsApp draft | **Yes** | AI using vertical script + `{name}{org}{city}` | Personalize 1 line; hit send |
| Follow-up reminders | **Yes** | Sheet conditional formatting + daily filter `next_action_date=today` | Send the message |
| IndiaMART RFQ first reply | **Semi** | Template + AI fill from RFQ text | Send &lt;15 min; ask 4 qualify Qs |
| LinkedIn connect notes | **Yes** | AI batch 20/day | Don’t spam identical |
| Discovery call notes → CRM | **Yes** | Paste transcript/summary → AI extract fields | Confirm product_fit |
| Proposal draft | **Yes** | AI fill from template + notes | **Lock price & exclusions** |
| Demo script coaching | **Yes** | AI roleplay objections | You run live demo |
| Meeting scheduling | **Semi** | Calendar link in WA | Confirm IST |
| Invoice PDF | **Semi** | Template | GST fields correct |
| Contract legal invent | **No** | — | Lawyer-reviewed MSA only |
| Live demo to buyer | **No** | — | You on camera |
| Final price / discount | **No** | — | You only |
| Ad spend changes | **No** | — | You / media buyer |
| Production deploy | **No** | — | You / engineer |
| Fake urgency / fake clients | **Forbidden** | — | — |

### AI prompt pack (copy-paste)

**Outreach batch**
> Using the clinic script in docs, write 20 WhatsApp first messages. Inputs CSV: name, org, city, niche. Max 5 lines, one question, include CareDesk demo URL. No fake claims about team size.

**RFQ reply**
> Turn this IndiaMART RFQ into a reply: ask clinic vs hospital, doctors/beds, branches, must modules. Offer 15-min live demo. Tone: Pune SMB, professional, short.

**Proposal fill**
> Fill proposal template for CareDesk Growth from these call notes: … Output only client-facing sections. Flag any scope that needs custom hours.

**Objection**
> Buyer said “we already have Practo”. Give 3 short rebuttals that still respect their setup and pitch white-label + billing ownership.

---

## What to automate in week 1 vs later

### Week 1 (must)
- Sheet pipeline + filters  
- WA quick replies  
- AI outreach drafts  
- Proposal template per vertical  

### Week 2–4
- Calendar booking link  
- Loom backup demos (one per vertical)  
- Meta lead form → Sheet (Zapier/Make free tier)  
- IndiaMART catalog images  

### After ₹5L
- Paid scraper / enrichment  
- HubSpot or Bitrix  
- VA runs Block 2 list-building  
- Simple chatbot on site (qualify only; human closes)

---

## Do-not-automate red lines

1. Sending messages that invent case studies or “70 person team”.  
2. Auto-discounting below floor prices.  
3. AI promising LIS/TPA/WhatsApp API “included” without scope.  
4. Unattended bots arguing with angry buyers.
