# Hospital sales pipeline

Import [`pipeline.csv`](./pipeline.csv) into Google Sheets. Freeze header row. Filter by `stage` and `next_action_date`.

## Stages (use exactly these values)

| Stage | Meaning | Exit criteria |
|---|---|---|
| `Lead` | Name + phone/WhatsApp captured | First message sent → `Contacted` |
| `Contacted` | Outreach done, awaiting reply | Reply or call connect → `Qualified` / `Nurture` |
| `Qualified` | ICP + pain + budget/timing signal | Demo booked → `Demo booked` |
| `Demo booked` | Calendar set | Demo completed → `Demo done` |
| `Demo done` | Live walkthrough finished | Proposal sent → `Proposal` |
| `Proposal` | PDF out, validity running | Verbal/written yes → `Negotiation` |
| `Negotiation` | Price/scope discussion | Kickoff invoice paid → `Won` |
| `Won` | Paid kickoff | Onboarding started → `Onboarding` |
| `Onboarding` | Delivery in progress | Go-live → `AMC live` |
| `AMC live` | Recurring client | Expansion / renewal tracked |
| `Nurture` | Not now | Touch every 30–45 days |
| `Lost` | Closed-lost | Fill `won_lost_reason` |

## Stage SLAs

| Stage | Max age before chase |
|---|---|
| Contacted | 2 days |
| Qualified | 3 days to book demo |
| Demo done | **24 hours** to send proposal |
| Proposal | Day 2, 5, 10 follow-ups |
| Negotiation | Weekly until win/lose |

## Weekly pipeline review (30 min)

1. How many demos this week vs target (5)?  
2. Any `Demo done` without proposal? Fix same day.  
3. Any `AMC live` upsell (branch / apps / marketing)?  
4. MediCore / broken demos — none pitched?  
5. Cash: kickoff invoices outstanding.

## Conversion benchmarks (early-stage agency)

| Step | Rough conversion |
|---|---|
| Outreach → conversation | 15–25% |
| Conversation → demo | 40–50% |
| Demo → proposal | 70%+ |
| Proposal → won | 20–35% |

If demo→won &lt;15%, fix packaging/price clarity — not only lead volume.

## Recurring client machine

Every `Won` must create:

1. AMC start date + amount in sheet  
2. WhatsApp support group or ticket channel  
3. 30-day health check call  
4. 90-day expansion ask (second branch / apps / SEO for hospital site)

**₹1 Cr path (hospital-weighted example):**  
10 HospitalOS/CareDesk wins averaging ₹4L one-time (₹40L) + 15 AMCs averaging ₹30k/month by late year (₹54L annualized run-rate) + expansions/services — mix toward AMC early.
