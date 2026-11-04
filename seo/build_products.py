"""
Builds product SEO edits (clean title, focus keyword, short description,
image alt) for every product from products.json, writes product_edits.json.
Short descriptions only restate what the product title / category / own
description already say; brand names are used only where the title names
the brand (some brand tags on generic items look unreliable).
"""
import json, re

P = {x['id']: x for x in json.load(open('products.json'))}

# id: (clean title, short name used as focus keyword + in the description)
T = {
 4698: ("Must EP3000 Plus 3kW 24V Low Frequency Inverter Charger", "Must 3kW 24V inverter charger"),
 4700: ("Felicity Solar IVPS7548 7.5kVA 48V Low Frequency Inverter Charger", "Felicity 7.5kVA inverter charger"),
 4702: ("Must PC18-8025F 80A MPPT Solar Charge Controller", "Must 80A MPPT charge controller"),
 4704: ("Deye 8kW (8kVA) 48V Single Phase Hybrid Solar Inverter", "Deye 8kW hybrid inverter"),
 4692: ("Felicity LPBF48100-M 5kWh 48V Lithium Battery Pack with BMS", "Felicity 5kWh lithium battery"),
 4694: ("Vestwoods 12V 100Ah LiFePO4 Lithium Battery", "Vestwoods 12V 100Ah lithium battery"),
 4696: ("SMA Sunny Tripower 6000TL Grid-Tie Inverter", "SMA Sunny Tripower 6000TL"),
 4686: ("Felicity 200Ah 12V Deep Cycle Gel Battery", "Felicity 200Ah gel battery"),
 4688: ("Modi 100W LED Solar Floodlight, IP65, with Remote Control", "Modi 100W solar floodlight"),
 4690: ("Jinko 345W Monocrystalline Solar Panel", "Jinko 345W solar panel"),
 4682: ("Felicity 100Ah 12V Deep Cycle Gel Battery", "Felicity 100Ah gel battery"),
 4684: ("Felicity 150Ah 12V Deep Cycle Gel Battery", "Felicity 150Ah gel battery"),
 4676: ("Felicity IVPS2512 2.5kVA (2kW) 12V Pure Sine Wave Inverter Charger", "Felicity 2.5kVA inverter charger"),
 4678: ("Felicity IVPS0712 0.7kVA (0.56kW) 12V Pure Sine Wave Inverter Charger", "Felicity 0.7kVA inverter charger"),
 4680: ("R Energy 200Ah 12V Deep Cycle Maintenance-Free Battery", "R Energy 200Ah deep cycle battery"),
 4674: ("Felicity 30A 12V/24V MPPT Charge Controller", "Felicity 30A MPPT charge controller"),
 4664: ("Felicity SCCM10048-II 100A 12V/24V/48V MPPT Charge Controller", "Felicity 100A MPPT charge controller"),
 4666: ("Felicity SCCM8048-II 80A 12V/24V/48V MPPT Charge Controller", "Felicity 80A MPPT charge controller"),
 4668: ("Felicity SCCM6048-II 60A 12V/24V/48V MPPT Charge Controller", "Felicity 60A MPPT charge controller"),
 4670: ("Felicity SCCM4548-II 45A 12V/24V/48V MPPT Charge Controller", "Felicity 45A 48V MPPT charge controller"),
 4672: ("Felicity SCCM4524-II 45A 12V/24V MPPT Charge Controller", "Felicity 45A 24V MPPT charge controller"),
 4654: ("Felicity LPBF48150-P 7.2kWh 48V Lithium Battery Pack with BMS", "Felicity 7.2kWh lithium battery"),
 4656: ("Felicity Solar IVPS10048 10kVA 48V Low Frequency Inverter Charger", "Felicity 10kVA inverter charger"),
 4658: ("Felicity Solar IVPS5048 5kVA Low Frequency Inverter Charger", "Felicity 5kVA inverter charger"),
 4660: ("Felicity Solar IVPS3524 3.5kVA 24V Low Frequency Inverter Charger", "Felicity 3.5kVA inverter charger"),
 4662: ("Felicity SCCM12048-II 120A 12V/24V/48V MPPT Charge Controller", "Felicity 120A MPPT charge controller"),
 4650: ("Felicity LPBF48300 15kWh 48V Lithium Battery Pack with BMS", "Felicity 15kWh lithium battery"),
 4652: ("Felicity LPBF48200-H 10kWh 48V Lithium Battery Pack with BMS", "Felicity 10kWh lithium battery"),
 4648: ("Felicity LPBF48350 17.5kWh 48V Lithium Battery Pack with BMS", "Felicity 17.5kWh lithium battery"),
 4646: ("Felicity IVCM1012 1kVA 12V High Frequency Inverter", "Felicity 1kVA inverter"),
 4644: ("Felicity Solar IVEM3024 3kVA 24V Hybrid High Frequency Inverter", "Felicity 3kVA hybrid inverter"),
 4642: ("Felicity Solar IVEM6048 6kVA 48V Hybrid High Frequency Inverter", "Felicity 6kVA hybrid inverter"),
 4640: ("Felicity Solar IVEM8048 8kVA 48V Hybrid High Frequency Inverter", "Felicity 8kVA hybrid inverter"),
 4638: ("Jinko JKM620N-78HL4 620W Monocrystalline Half-Cell Solar Panel", "Jinko 620W solar panel"),
 4634: ("Hinen B5000 Series 5kWh 48V Lithium Battery", "Hinen 5kWh lithium battery"),
 4636: ("Hinen N3000 3kW Hybrid Inverter", "Hinen 3kW hybrid inverter"),
 4632: ("Hinen M2000S Series Hybrid Inverter", "Hinen M2000S hybrid inverter"),
 4628: ("Hinen H6000-EU 6kW 48V Hybrid Inverter", "Hinen 6kW hybrid inverter"),
 4630: ("Hinen H6000-OG 6kW Off-Grid Hybrid Inverter", "Hinen 6kW off-grid inverter"),
 4624: ("Hinen PS600 600W Portable Power Station (512Wh)", "Hinen PS600 portable power station"),
 4626: ("Hinen BP5000 5kWh 48V Stackable Low Voltage Lithium Battery", "Hinen BP5000 lithium battery"),
 4622: ("Hinen PS3000 3000W Portable Power Station (2560Wh)", "Hinen PS3000 portable power station"),
 4620: ("Hinen 7.7kWh High Voltage Battery Module", "Hinen 7.7kWh high voltage battery"),
 4618: ("SRNE Roadsmart 5kVA 48V Hybrid Inverter", "SRNE 5kVA hybrid inverter"),
 4614: ("SRNE ASF48100U200-H 10kW 48V Hybrid Inverter", "SRNE 10kW hybrid inverter"),
 4616: ("SRNE Roadsmart 3kVA 24V Hybrid Inverter", "SRNE 3kVA hybrid inverter"),
 4608: ("300W 37V Monocrystalline Solar Panel", "300W monocrystalline solar panel"),
 4610: ("200W 18V Monocrystalline Solar Panel", "200W monocrystalline solar panel"),
 4612: ("100W 18V Monocrystalline Solar Panel", "100W monocrystalline solar panel"),
 4606: ("350W 38V Monocrystalline Solar Panel", "350W monocrystalline solar panel"),
 4602: ("HPFL15003 150W 12V Waterproof Solar LED Flood Light", "150W solar flood light"),
 4604: ("Jinko 580W 52V Monocrystalline Half-Cell Solar Panel", "Jinko 580W solar panel"),
 4598: ("Deye SUN-5K-SG01/03LP1-EU 5kW 48V Hybrid Inverter", "Deye 5kW hybrid inverter"),
 4600: ("HPFL10003 100W 12V Waterproof Solar LED Flood Light", "100W solar flood light"),
 4588: ("Seven Stars 200L Pressurized Heat-Pipe Solar Water Heater (Stainless Steel)", "Seven Stars 200L heat-pipe solar water heater"),
 4590: ("Seven Stars 300L Pressurized Heat-Pipe Solar Water Heater (Stainless Steel)", "Seven Stars 300L heat-pipe solar water heater"),
 4592: ("Seven Stars 150L Pressurized Heat-Pipe Solar Water Heater (Stainless Steel)", "Seven Stars 150L heat-pipe solar water heater"),
 4594: ("Deye SUN-6K-SG03LP1-EU 6kW 48V Hybrid Inverter", "Deye 6kW hybrid inverter"),
 4596: ("Deye SUN-3.6K-SG01/03LP1-EU 3.6kW 48V Hybrid Inverter", "Deye 3.6kW hybrid inverter"),
 4586: ("Seven Stars 300L Direct Flat Plate Pressurized Solar Water Heater", "Seven Stars 300L flat plate solar water heater"),
 4584: ("Seven Stars 200L Direct Flat Plate Pressurized Solar Water Heater", "Seven Stars 200L flat plate solar water heater"),
 4582: ("Deye SUN-12K-SG01LP1-EU 12kW 48V Single Phase Hybrid Inverter", "Deye 12kW single phase hybrid inverter"),
 4576: ("Deye SUN-8K-SG04LP3 8kW 48V Three Phase Hybrid Inverter", "Deye 8kW three phase hybrid inverter"),
 4578: ("Deye SUN-16K-SG01LP1-EU 16kW 48V Single Phase Hybrid Inverter", "Deye 16kW hybrid inverter"),
 4580: ("Deye SUN-14K-SG01LP1-EU 14kW 48V Single Phase Hybrid Inverter", "Deye 14kW hybrid inverter"),
 4570: ("Deye SUN-50K-SG01HP3-EU-BM4 50kW Three Phase Hybrid Inverter", "Deye 50kW hybrid inverter"),
 4572: ("Deye SUN-12K-SG04LP3 12kW Three Phase Hybrid Inverter", "Deye 12kW three phase hybrid inverter"),
 4574: ("Deye SUN-10K-SG04LP3 10kW Three Phase Hybrid Inverter", "Deye 10kW three phase hybrid inverter"),
 4568: ("Deye SUN-30K-SG01HP3-EU-BM3 30kW Three Phase Hybrid Inverter", "Deye 30kW hybrid inverter"),
 4564: ("Solis S6-EH1P8K-L-PLUS 8kW Single Phase Low Voltage Hybrid Inverter", "Solis 8kW hybrid inverter"),
 4566: ("Solis S6-EH1P5K-L-PLUS 5kW Single Phase Low Voltage Hybrid Inverter", "Solis 5kW hybrid inverter"),
 4560: ("Menred LFP.6144.W 6.14kWh 51.2V 120Ah Lithium Battery", "Menred 6.14kWh lithium battery"),
 4562: ("Solis S6-EH3P15K02-NV-YD-L 15kW Three Phase Low Voltage Hybrid Inverter", "Solis 15kW three phase hybrid inverter"),
 4556: ("10kW 48V Full Solar System Package with Installation", "10kW solar system package"),
 4558: ("SRNE SR-EOS10B 10.24kWh 51.2V 200Ah Lithium Battery", "SRNE 10.24kWh lithium battery"),
 4554: ("5kVA 48V Full Solar System Package with Installation", "5kVA solar system package"),
 4552: ("3kW 24V Hybrid Solar System Package with Installation", "3kW solar system package"),
 4546: ("SVC 5.12kWh 51.2V 100Ah Lithium Battery with BMS", "SVC 5.12kWh 48V lithium battery"),
 4548: ("Seven SS Stars 5kWh 48V 100Ah Lithium Battery", "Seven SS Stars 5kWh lithium battery"),
 4550: ("1.5kVA 12V Hybrid Solar System Package with Installation", "1.5kVA solar system package"),
 4540: ("Suness EV-5.12M 25.6V 200Ah Lithium Battery", "Suness 25.6V 200Ah lithium battery"),
 4542: ("Jinko JKS-B48100-HI 4.8kWh 48V Lithium Battery", "Jinko 4.8kWh lithium battery"),
 4544: ("SVC 5.12kWh 25.6V 200Ah Lithium Battery with BMS", "SVC 5.12kWh 24V lithium battery"),
 4534: ("Suness 10kWh Lithium Iron Phosphate (LiFePO4) Battery", "Suness 10kWh lithium battery"),
 4536: ("Suness EV-15.36N 15.36kWh Lithium Iron Phosphate Battery System", "Suness 15.36kWh lithium battery"),
 4538: ("Suness EV-5.12M 51.2V 100Ah Lithium Battery", "Suness 51.2V 100Ah lithium battery"),
 4532: ("GoodWe GW10K-ES-C10 10kW Hybrid Inverter", "GoodWe 10kW hybrid inverter"),
 4530: ("Felicity FLA12200 12V 200Ah Lithium Battery", "Felicity 12V 200Ah lithium battery"),
 4528: ("Felicity FLA24100 2.56kWh 24V Lithium Battery", "Felicity 2.56kWh lithium battery"),
 4526: ("Felicity FLA12100 12V Lithium Battery (1.26kWh)", "Felicity FLA12100 12V lithium battery"),
 4524: ("Felicity FLA48100 5.12kWh 48V Lithium Battery", "Felicity 5.12kWh lithium battery"),
}

CTA = " Ask us to confirm it is the right fit, then get delivery and installation support from our Nairobi or Watamu branch."
CAT_TXT = {
 'hybrid-solar-inverters': "{K}: a hybrid inverter that manages solar panels, battery storage and grid power from one unit and switches to backup automatically during outages.",
 'off-grid-solar-inverters': "{K}: an off-grid hybrid inverter for sites without a reliable grid supply, running solar panels and batteries as a standalone system.",
 'grid-tie-inverters': "{K}: a grid-tie inverter that feeds solar power into your building alongside the grid. On its own it does not provide backup during outages.",
 'inverter-chargers': "{K}: a low-frequency inverter charger that keeps essential appliances running from batteries during outages and recharges them from mains power.",
 'mppt-charge-controller': "{K}: an MPPT solar charge controller that regulates charging from your panels to your battery bank, tracking the panels' maximum power point to get more energy into the batteries than a basic PWM controller.",
 'lithium-batteries': "{K}: a lithium battery for solar and inverter backup, built for deeper daily discharge and more charge cycles than lead-acid or gel batteries. See the description for capacity, cycle life and warranty.",
 'solar-gel-batteries': "{K}: a sealed, maintenance-free deep cycle battery for inverter backup and off-grid solar systems.",
 'monocrystalline': "{K}: a monocrystalline panel with higher efficiency per square metre, a good fit where roof space is limited. We size the array, mounting and protection to your system.",
 'solar-flood-light': "{K}: a solar LED flood light for compounds, gates, walkways and parking areas that charges from a solar panel during the day, with no grid wiring or trenching needed.",
}
HEATPIPE = "{K}: a pressurized heat-pipe (evacuated tube) solar water heater with a stainless steel tank, supplying hot water at mains-like pressure to showers and taps and performing well on cooler or cloudy days."
FLAT = "{K}: a direct flat-plate pressurized solar water heater that supplies hot water at mains-like pressure to showers and taps; flat-plate collectors are robust and suit sunny sites with good roof space."
SPECIAL = {
 4624: "Hinen PS600 portable power station: 600W pure sine wave AC output (1,000W peak) from a 512Wh LiFePO4 battery rated up to 3,000 cycles, with USB-A, USB-C, car and DC outputs. Charges from mains, solar panels or a car, and weighs about 7kg.",
 4622: "Hinen PS3000 portable power station: 3,000W pure sine wave AC output (5,000W peak) from a 2,560Wh LiFePO4 battery rated up to 4,000 cycles. Charges from mains, solar or a car, and expands with up to six extra battery packs for longer backup.",
 4550: "Complete 1.5kVA 12V hybrid solar system: 2 x 550W monocrystalline panels, a 1.5kVA SRNE hybrid inverter and a 200Ah 12V battery, with accessories, transport and installation by Solar Connect Kenya included.",
 4552: "Complete 3.3kW 24V hybrid solar system: 4 x 550W monocrystalline panels, a 3.3kW 24V hybrid inverter and a 5kWh Felicity lithium battery (200Ah, 25.6V), with accessories, transport and installation included.",
 4554: "Complete 5kW 48V hybrid solar system: 6 x 550W panels, a 5kW 48V hybrid inverter and a 6.12kWh lithium battery, with accessories, transport and installation by Solar Connect Kenya included.",
 4556: "Complete 10kW 48V hybrid solar system: 8 x 550W monocrystalline panels, a 10kW 48V hybrid inverter and a 10.24kWh lithium battery (200Ah, 51.2V), with accessories, transport and installation included.",
}
NEW_CAT = {4624: 'portable-power-stations', 4622: 'portable-power-stations', 4550: 'solar-system-packages', 4552: 'solar-system-packages', 4554: 'solar-system-packages', 4556: 'solar-system-packages'}

out = []
for pid, x in P.items():
    title, k = T[pid]
    cat = NEW_CAT.get(pid) or (x['cats'][0] if x['cats'] else '')
    if pid in SPECIAL:
        ex = SPECIAL[pid] + ("" if cat == 'solar-system-packages' else CTA)
    elif cat == 'pressurized-systems':
        ex = (HEATPIPE if 'Heat-Pipe' in title else FLAT).format(K=k[0].upper() + k[1:]) + CTA
    else:
        ex = CAT_TXT[cat].format(K=k[0].upper() + k[1:]) + CTA
    out.append({'id': pid, 'title': title, 'keyword': k, 'excerpt': ex, 'alt': title, 'new_cat': NEW_CAT.get(pid), 'old_title': x['title']})

assert len(out) == len(P) == len(T)
json.dump(out, open('product_edits.json', 'w'), indent=1, ensure_ascii=False)
w = [len(o['excerpt'].split()) for o in out]
print(len(out), 'edits | excerpt words min/max', min(w), max(w))
for o in out[:3] + [o for o in out if o['id'] in (4622, 4552, 4588, 4696)]:
    print('-', o['title'], '\n   ', o['excerpt'])
