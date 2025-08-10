<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\District;
use App\Models\Province;
use App\Models\CountryTrans;
use App\Models\DistrictTrans;
use App\Models\Nationality;
use App\Models\NationalityTrans;
use App\Models\ProvinceTrans;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CountrySeeder extends Seeder
{


    public function run(): void
    {
        // Mapping country names to ISO codes
        $countryInfo = [
            "Saudi Arabia" => ['abbr' => 'SA', 'code' => '+966'],
            "Afghanistan" => ['abbr' => 'AF', 'code' => '+93'],
            "United States" => ['abbr' => 'US', 'code' => '+1'],
            "United Kingdom" => ['abbr' => 'GB', 'code' => '+44'],
            "Canada" => ['abbr' => 'CA', 'code' => '+1'],
            "Germany" => ['abbr' => 'DE', 'code' => '+49'],
            "France" => ['abbr' => 'FR', 'code' => '+33'],
            "Italy" => ['abbr' => 'IT', 'code' => '+39'],
            "Spain" => ['abbr' => 'ES', 'code' => '+34'],
            "China" => ['abbr' => 'CN', 'code' => '+86'],
            "Japan" => ['abbr' => 'JP', 'code' => '+81'],
            "Russia" => ['abbr' => 'RU', 'code' => '+7'],
            "Iran" => ['abbr' => 'IR', 'code' => '+98'],
            "Pakistan" => ['abbr' => 'PK', 'code' => '+92'],
            "Turkey" => ['abbr' => 'TR', 'code' => '+90'],
            "Egypt" => ['abbr' => 'EG', 'code' => '+20'],
            "Brazil" => ['abbr' => 'BR', 'code' => '+55'],
            "Mexico" => ['abbr' => 'MX', 'code' => '+52'],
            "Australia" => ['abbr' => 'AU', 'code' => '+61'],
            "Argentina" => ['abbr' => 'AR', 'code' => '+54'],
            "Bangladesh" => ['abbr' => 'BD', 'code' => '+880'],
            "Belgium" => ['abbr' => 'BE', 'code' => '+32'],
            "Netherlands" => ['abbr' => 'NL', 'code' => '+31'],
            "Sweden" => ['abbr' => 'SE', 'code' => '+46'],
            "Norway" => ['abbr' => 'NO', 'code' => '+47'],
            "Denmark" => ['abbr' => 'DK', 'code' => '+45'],
            "Finland" => ['abbr' => 'FI', 'code' => '+358'],
            "Switzerland" => ['abbr' => 'CH', 'code' => '+41'],
            "Austria" => ['abbr' => 'AT', 'code' => '+43'],
            "Poland" => ['abbr' => 'PL', 'code' => '+48'],
            "Portugal" => ['abbr' => 'PT', 'code' => '+351'],
            "Greece" => ['abbr' => 'GR', 'code' => '+30'],
            "Ukraine" => ['abbr' => 'UA', 'code' => '+380'],
            "South Korea" => ['abbr' => 'KR', 'code' => '+82'],
            "North Korea" => ['abbr' => 'KP', 'code' => '+850'],
            "Thailand" => ['abbr' => 'TH', 'code' => '+66'],
            "Vietnam" => ['abbr' => 'VN', 'code' => '+84'],
            "Indonesia" => ['abbr' => 'ID', 'code' => '+62'],
            "Malaysia" => ['abbr' => 'MY', 'code' => '+60'],
            "Philippines" => ['abbr' => 'PH', 'code' => '+63'],
            "Iraq" => ['abbr' => 'IQ', 'code' => '+964'],
            "Syria" => ['abbr' => 'SY', 'code' => '+963'],
            "Jordan" => ['abbr' => 'JO', 'code' => '+962'],
            "Lebanon" => ['abbr' => 'LB', 'code' => '+961'],
            "Qatar" => ['abbr' => 'QA', 'code' => '+974'],
            "UAE" => ['abbr' => 'AE', 'code' => '+971'],
            "Kuwait" => ['abbr' => 'KW', 'code' => '+965'],
            "Oman" => ['abbr' => 'OM', 'code' => '+968'],
            "Yemen" => ['abbr' => 'YE', 'code' => '+967'],
            "Sudan" => ['abbr' => 'SD', 'code' => '+249'],
            "South Africa" => ['abbr' => 'ZA', 'code' => '+27'],
            "Kenya" => ['abbr' => 'KE', 'code' => '+254'],
            "Nigeria" => ['abbr' => 'NG', 'code' => '+234'],
            "Morocco" => ['abbr' => 'MA', 'code' => '+212'],
            "Tunisia" => ['abbr' => 'TN', 'code' => '+216'],
            "Algeria" => ['abbr' => 'DZ', 'code' => '+213'],
            "Angola" => ['abbr' => 'AO', 'code' => '+244'],
            "Mozambique" => ['abbr' => 'MZ', 'code' => '+258'],
            "Zambia" => ['abbr' => 'ZM', 'code' => '+260'],
            "Zimbabwe" => ['abbr' => 'ZW', 'code' => '+263'],
            "Malawi" => ['abbr' => 'MW', 'code' => '+265'],
            "Tanzania" => ['abbr' => 'TZ', 'code' => '+255'],
            "Uganda" => ['abbr' => 'UG', 'code' => '+256'],
            "Rwanda" => ['abbr' => 'RW', 'code' => '+250'],
            "Burundi" => ['abbr' => 'BI', 'code' => '+257'],
            "Ethiopia" => ['abbr' => 'ET', 'code' => '+251'],
            "Somalia" => ['abbr' => 'SO', 'code' => '+252'],
            "Chad" => ['abbr' => 'TD', 'code' => '+235'],
            "Central African Republic" => ['abbr' => 'CF', 'code' => '+236'],
            "Congo" => ['abbr' => 'CG', 'code' => '+242'],
            "Democratic Republic of the Congo" => ['abbr' => 'CD', 'code' => '+243'],
            "Gabon" => ['abbr' => 'GA', 'code' => '+241'],
            "Seychelles" => ['abbr' => 'SC', 'code' => '+248'],
            "Mauritius" => ['abbr' => 'MU', 'code' => '+230'],
            "Madagascar" => ['abbr' => 'MG', 'code' => '+261'],
            "Comoros" => ['abbr' => 'KM', 'code' => '+269'],
            "Somaliland" => ['abbr' => 'SO', 'code' => '+252'],
            "Sri Lanka" => ['abbr' => 'LK', 'code' => '+94'],
            "Nepal" => ['abbr' => 'NP', 'code' => '+977'],
            "Bhutan" => ['abbr' => 'BT', 'code' => '+975'],
            "Maldives" => ['abbr' => 'MV', 'code' => '+960'],
            "India" => ['abbr' => 'IN', 'code' => '+91'],
            "Belarus" => ['abbr' => 'BY', 'code' => '+375'],
            "Lithuania" => ['abbr' => 'LT', 'code' => '+370'],
            "Latvia" => ['abbr' => 'LV', 'code' => '+371'],
            "Estonia" => ['abbr' => 'EE', 'code' => '+372'],
            "Moldova" => ['abbr' => 'MD', 'code' => '+373'],
            "Armenia" => ['abbr' => 'AM', 'code' => '+374'],
            "Georgia" => ['abbr' => 'GE', 'code' => '+995'],
            "Azerbaijan" => ['abbr' => 'AZ', 'code' => '+994'],
            "Kazakhstan" => ['abbr' => 'KZ', 'code' => '+7'],
            "Kyrgyzstan" => ['abbr' => 'KG', 'code' => '+996'],
            "Uzbekistan" => ['abbr' => 'UZ', 'code' => '+998'],
            "Turkmenistan" => ['abbr' => 'TM', 'code' => '+993'],
            "Tajikistan" => ['abbr' => 'TJ', 'code' => '+992'],
            "Bulgaria" => ['abbr' => 'BG', 'code' => '+359'],
            "Romania" => ['abbr' => 'RO', 'code' => '+40'],
            "Croatia" => ['abbr' => 'HR', 'code' => '+385'],
            "Slovenia" => ['abbr' => 'SI', 'code' => '+386'],
            "Serbia" => ['abbr' => 'RS', 'code' => '+381'],
            "Bosnia and Herzegovina" => ['abbr' => 'BA', 'code' => '+387'],
            "Montenegro" => ['abbr' => 'ME', 'code' => '+382'],
            "North Macedonia" => ['abbr' => 'MK', 'code' => '+389'],
            "Albania" => ['abbr' => 'AL', 'code' => '+355'],
            "Kosovo" => ['abbr' => 'XK', 'code' => '+383'],
            "Malta" => ['abbr' => 'MT', 'code' => '+356'],
            "Cyprus" => ['abbr' => 'CY', 'code' => '+357'],
            "Israel" => ['abbr' => 'IL', 'code' => '+972'],
            "Palestine" => ['abbr' => 'PS', 'code' => '+970'],
            "Barbados" => ['abbr' => 'BB', 'code' => '+1-246'],
            "Saint Lucia" => ['abbr' => 'LC', 'code' => '+1-758'],
            "Saint Vincent and the Grenadines" => ['abbr' => 'VC', 'code' => '+1-784'],
            "Antigua and Barbuda" => ['abbr' => 'AG', 'code' => '+1-268'],
            "Dominica" => ['abbr' => 'DM', 'code' => '+1-767'],
            "Grenada" => ['abbr' => 'GD', 'code' => '+1-473'],
            "Saint Kitts and Nevis" => ['abbr' => 'KN', 'code' => '+1-869'],
            "Jamaica" => ['abbr' => 'JM', 'code' => '+1-876'],
            "Haiti" => ['abbr' => 'HT', 'code' => '+509'],
            "Cuba" => ['abbr' => 'CU', 'code' => '+53'],
            "Dominican Republic" => ['abbr' => 'DO', 'code' => '+1-809'],
            "Puerto Rico" => ['abbr' => 'PR', 'code' => '+1-787'],
            "Costa Rica" => ['abbr' => 'CR', 'code' => '+506'],
            "Panama" => ['abbr' => 'PA', 'code' => '+507'],
            "Nicaragua" => ['abbr' => 'NI', 'code' => '+505'],
            "El Salvador" => ['abbr' => 'SV', 'code' => '+503'],
            "Honduras" => ['abbr' => 'HN', 'code' => '+504'],
            "Guatemala" => ['abbr' => 'GT', 'code' => '+502'],
            "Belize" => ['abbr' => 'BZ', 'code' => '+501'],
            "Colombia" => ['abbr' => 'CO', 'code' => '+57'],
            "Venezuela" => ['abbr' => 'VE', 'code' => '+58'],
            "Guyana" => ['abbr' => 'GY', 'code' => '+592'],
            "Suriname" => ['abbr' => 'SR', 'code' => '+597'],
            "French Guiana" => ['abbr' => 'GF', 'code' => '+594'],
            "Luxembourg" => ['abbr' => 'LU', 'code' => '+352'],
            "Iceland" => ['abbr' => 'IS', 'code' => '+354'],
            "Ireland" => ['abbr' => 'IE', 'code' => '+353'],
            "Andorra" => ['abbr' => 'AD', 'code' => '+376'],
            "Monaco" => ['abbr' => 'MC', 'code' => '+377'],
            "San Marino" => ['abbr' => 'SM', 'code' => '+378'],
            "Vatican City" => ['abbr' => 'VA', 'code' => '+379'],
            "Liechtenstein" => ['abbr' => 'LI', 'code' => '+423'],
            "Czech Republic" => ['abbr' => 'CZ', 'code' => '+420'],
            "Slovakia" => ['abbr' => 'SK', 'code' => '+421'],
            "Hungary" => ['abbr' => 'HU', 'code' => '+36'],
            "Trinidad and Tobago" => ['abbr' => 'TT', 'code' => '+1-868'],
            "The Bahamas" => ['abbr' => 'BS', 'code' => '+1-242'],
            "South Sudan" => ['abbr' => 'SS', 'code' => '+211'],
            "Eritrea" => ['abbr' => 'ER', 'code' => '+291'],
            "Djibouti" => ['abbr' => 'DJ', 'code' => '+253'],
            "Mali" => ['abbr' => 'ML', 'code' => '+223'],
            "Niger" => ['abbr' => 'NE', 'code' => '+227'],
            "Burkina Faso" => ['abbr' => 'BF', 'code' => '+226'],
            "Senegal" => ['abbr' => 'SN', 'code' => '+221'],
            "The Gambia" => ['abbr' => 'GM', 'code' => '+220'],
            "Guinea" => ['abbr' => 'GN', 'code' => '+224'],
            "Guinea-Bissau" => ['abbr' => 'GW', 'code' => '+245'],
            "Cape Verde" => ['abbr' => 'CV', 'code' => '+238'],
            "Sao Tome and Principe" => ['abbr' => 'ST', 'code' => '+239'],
            "Equatorial Guinea" => ['abbr' => 'GQ', 'code' => '+240'],
            "Libya" => ['abbr' => 'LY', 'code' => '+218'],
            "Ghana" => ['abbr' => 'GH', 'code' => '+233'],
            "Togo" => ['abbr' => 'TG', 'code' => '+228'],
            "Benin" => ['abbr' => 'BJ', 'code' => '+229'],
            "Cote d'Ivoire" => ['abbr' => 'CI', 'code' => '+225'],
            "Cameroon" => ['abbr' => 'CM', 'code' => '+237'],
            "Lesotho" => ['abbr' => 'LS', 'code' => '+266'],
            "Eswatini" => ['abbr' => 'SZ', 'code' => '+268'],
            "Botswana" => ['abbr' => 'BW', 'code' => '+267'],
            "Namibia" => ['abbr' => 'NA', 'code' => '+264'],
            "New Zealand" => ['abbr' => 'NZ', 'code' => '+64'],
            "Fiji" => ['abbr' => 'FJ', 'code' => '+679'],
            "Papua New Guinea" => ['abbr' => 'PG', 'code' => '+675'],
            "Solomon Islands" => ['abbr' => 'SB', 'code' => '+677'],
            "Vanuatu" => ['abbr' => 'VU', 'code' => '+678'],
            "Samoa" => ['abbr' => 'WS', 'code' => '+685'],
            "Tonga" => ['abbr' => 'TO', 'code' => '+676'],
            "Kiribati" => ['abbr' => 'KI', 'code' => '+686'],
            "Marshall Islands" => ['abbr' => 'MH', 'code' => '+692'],
            "Federated States of Micronesia" => ['abbr' => 'FM', 'code' => '+691'],
            "Palau" => ['abbr' => 'PW', 'code' => '+680'],
            "Nauru" => ['abbr' => 'NR', 'code' => '+674'],
            "Tuvalu" => ['abbr' => 'TV', 'code' => '+688'],
            "Timor-Leste" => ['abbr' => 'TL', 'code' => '+670']
        ];

        // Convert code to flag emoji
        $toFlag = function ($abbr) {
            return implode('', array_map(
                fn($char) => mb_convert_encoding('&#' . (127397 + ord($char)) . ';', 'UTF-8', 'HTML-ENTITIES'),
                str_split(strtoupper($abbr))
            ));
        };
        // Your $country array stays the same (from your original file)
        $country = [
            "Saudi Arabia" => [
                "fa" => "عربستان سعودی",
                "ps" => "سعودي عربستان",
                "nationality" => [
                    "en" => "Saudi",
                    "fa" => "سعودی",
                    "ps" => "سعودی",

                ],
                "provinces" => []

            ],
            "Afghanistan" => [
                "fa" => "افغانستان",
                "ps" => "افغانستان",
                "nationality" => [
                    "en" => "Afghan",
                    "fa" => "افغان",
                    "ps" => "افغان",

                ],
                "provinces" => [
                    "Kabul" => [
                        "fa" => "کابل",
                        "ps" => "کابل",
                        "District" => [
                            "Paghman" => ["fa" => "پغمان", "ps" => "پغمان"],
                            "Shakardara" => ["fa" => "شکردره", "ps" => "شکردره"],
                            "Kabul" => ["fa" => "کابل", "ps" => "کابل"],
                            "Chahar Asyab" => ["fa" => "چهاراسیاب", "ps" => "څلور اسیاب"],
                            "Surobi" => ["fa" => "سرابی", "ps" => "سرابی"],
                            "Bagrami" => ["fa" => "بگرام", "ps" => "بگرام"],
                            "Deh Sabz" => ["fa" => "دِه‌سبز", "ps" => "دِه‌سبز"],
                            "Farza" => ["fa" => "فَرزه", "ps" => "فَرزه"],
                            "Guldara" => ["fa" => "گُلدره", "ps" => "گُلدره"],
                            "Istalif" => ["fa" => "اِستالِف", "ps" => "اِستالِف"],
                            "Kalakan" => ["fa" => "کَلَکان", "ps" => "کَلَکان"],
                            "Khaki Jabbar" => ["fa" => "خاکِ جبار", "ps" => "خاکِ جبار"],
                            "Mir Bacha Kot" => ["fa" => "میربچه‌کوت ", "ps" => "مېربچه کوټ"],
                            "Mussahi" => ["fa" => "موسهی ", "ps" => " موسهی"],
                            "Qarabagh" => ["fa" => "قره‌باغ ", "ps" => " قره‌باغ"],


                        ]
                    ],
                    "Herat" => [
                        "fa" => "هرات",
                        "ps" => "هرات",
                        "District" => [
                            "Herat" => ["fa" => "هرات", "ps" => "هرات"],
                            "Ghorian" => ["fa" => "غوریان", "ps" => "غوریان"],
                            "Shindand" => ["fa" => "شندند", "ps" => "شندند"],
                            "Karukh" => ["fa" => "کرخ", "ps" => "کرخ"],
                            "Pashtun Zarghun" => ["fa" => "پشتون زرغون", "ps" => "پشتون زرغون"],
                            "Gulran" => ["fa" => "گلران", "ps" => "گلران"],
                            "Chishti Sharif" => ["fa" => "چِشت شریف", "ps" => "چِشت شریف"],
                            "Farsi" => ["fa" => "فارسی", "ps" => "فارسی"],
                            "Guzara" => ["fa" => "گُذَره", "ps" => "گُذَره"],
                            "Enjil" => ["fa" => "اِنجیل", "ps" => "اِنجیل"],
                            "Kohsan" => ["fa" => "کُهسان", "ps" => "کُهسان"],
                            "Kushk" => ["fa" => "کُشک", "ps" => "کُشک"],
                            "Kushki Kuhna" => ["fa" => "کُشک کهنه", "ps" => "کُشک کهنه"],
                            "Obe" => ["fa" => "اوبه", "ps" => "اوبه"],
                            "Zinda Jan" => ["fa" => "زنده‌جان", "ps" => "زنده‌جان"],
                            "Adraskan" => ["fa" => "ادرسکان", "ps" => "ادرسکان"],
                            "Koshk Roobat Sangi" => ["fa" => "کوشک روبات سنګي", "ps" => "کوشک روبات سنګي"],


                        ]
                    ],



                    "Balkh" => [
                        "fa" => "بلخ",
                        "ps" => "بلخ",
                        "District" => [
                            "Mazar-e Sharif" => ["fa" => "مزار شریف", "ps" => "مزار شریف"],
                            "Chahar Kint" => ["fa" => "چهارکنت", "ps" => "څلورکنت"],
                            "Sholgara" => ["fa" => "شولگره", "ps" => "شولگره"],
                            "Zari" => ["fa" => "زاری", "ps" => "زاری"],
                            "Charbolak" => ["fa" => "چارپولَک", "ps" => "چارپولَک"],
                            "Chimtal" => ["fa" => "چَمتال", "ps" => "چَمتال"],
                            "Dawlatabad" => ["fa" => "دولت‌آباد", "ps" => "دولت‌آباد"],
                            "Dihdadi" => ["fa" => "دِهدادی", "ps" => "دِهدادی"],
                            "Kaldar" => ["fa" => "کُلدار", "ps" => "کُلدار"],
                            "Khulm" => ["fa" => "خَلَم", "ps" => "خَلَم"],
                            "Kishindih" => ["fa" => "کَشنده", "ps" => "کَشنده"],
                            "Nahri Shahi" => ["fa" => "نهر شاهی", "ps" => "نهر شاهی"],
                            "Sholgara" => ["fa" => "شولگره", "ps" => "شولگره"],
                            "Shortepa" => ["fa" => "شورتپه", "ps" => "شورتپه"],
                            "Marmul" => ["fa" => "مارمَل", "ps" => "مارمَل"],
                            "Balkh" => ["fa" => "بلخ", "ps" => "بلخ"],


                        ]
                    ],
                    "Kandahar" => [
                        "fa" => "کندهار",
                        "ps" => "کندهار",
                        "District" => [
                            "Kandahar" => ["fa" => "کندهار", "ps" => "کندهار"],
                            "Dand" => ["fa" => "دند", "ps" => "دند"],
                            "Panjwayi" => ["fa" => "پنجوایی", "ps" => "پنجوایی"],
                            "Shah Wali Kot" => ["fa" => "شاه ولیکوت", "ps" => "شاه ولیکوت"],
                            "Arghandab" => ["fa" => "ارغنداب", "ps" => "ارغنداب"],
                            "Arghistan" => ["fa" => "اَرغستان", "ps" => "اَرغستان"],
                            "Daman" => ["fa" => "دامان", "ps" => "ژړی"],
                            "Ghorak" => ["fa" => "غورَک", "ps" => "غورَک"],
                            "Khakrez" => ["fa" => "خاکریز", "ps" => "خاکریز"],
                            "Maruf" => ["fa" => "معروف", "ps" => "معروف"],
                            "Maiwand" => ["fa" => "مَیوَند", "ps" => "مَیوَند"],
                            "Miyanishin" => ["fa" => "میانَشین", "ps" => "میانَشین"],
                            "Reg" => ["fa" => "ریگستان", "ps" => "ریگستان"],
                            "Shorabak" => ["fa" => "شورابَک", "ps" => "شورابَک"],
                            "Spin Boldak" => ["fa" => "سپین‌بولدَک", "ps" => "سپین‌بولدَک"],
                            "Nish" => ["fa" => "نیش", "ps" => "نیش"],
                            "Takhta pul" => ["fa" => "تخته پل", "ps" => "تخته پل"],
                            "Zhary" => ["fa" => "زهری ", "ps" => "زهری"],


                        ]
                    ],
                    "Nangarhar" => [
                        "fa" => "ننگرهار",
                        "ps" => "ننګرهار",
                        "District" => [
                            "Jalalabad" => ["fa" => "جلال آباد", "ps" => "جلال آباد"],
                            "Behsood" => ["fa" => "بهسود", "ps" => "بهسود"],
                            "Surkh Rod" => ["fa" => "سرخ رود", "ps" => "سرخ رود"],
                            "Nazi Bagh" => ["fa" => "نازی باغ", "ps" => "نازی باغ"],
                            "Khogiyani" => ["fa" => "خوگیانی", "ps" => "خوگیانی"],
                            "Deh Bala" => ["fa" => "ده‌بالا", "ps" => "ده‌بالا"],
                            "Shinwar" => ["fa" => "شینوار", "ps" => "شینوار"],
                            "Achin" => ["fa" => "اَچین", "ps" => "اَچین"],
                            "Chaparhar" => ["fa" => "چَپَرهار", "ps" => "چَپَرهار"],
                            "Darai Nur" => ["fa" => "درهٔ نور", "ps" => "درهٔ نور"],
                            "Bati Kot" => ["fa" => "بَتی‌کوت", "ps" => "بَتی‌کوت"],
                            "Dur Baba" => ["fa" => "دَربابا", "ps" => "دَربابا"],
                            "Goshta" => ["fa" => "گوشته", "ps" => "گوشته"],
                            "Hisarak" => ["fa" => "حصارک", "ps" => "حصارک"],
                            "Kama" => ["fa" => "کامه", "ps" => "کامه"],
                            "Khogyani" => ["fa" => "خوگیانی", "ps" => "خوگیانی"],
                            "Kot" => ["fa" => "کوت", "ps" => "کوت"],
                            "Kuz Kunar" => ["fa" => "کوزکُنر", "ps" => "کوزکُنر"],
                            "Lal Pur" => ["fa" => "لعل‌پور", "ps" => "لعل‌پور"],
                            "Momand Dara" => ["fa" => "مُهمنددره", "ps" => "مُهمنددره"],
                            "Nazyan" => ["fa" => "نازیان", "ps" => "نازیان"],
                            "Pachir Aw Agam" => ["fa" => "پَچیرواَگام", "ps" => "پَچیرواَگام"],
                            "Rodat" => ["fa" => "رودات", "ps" => "رودات"],
                            "Sherzad" => ["fa" => "شیرزاد", "ps" => "شیرزاد"],
                            "Surkh Rod" => ["fa" => "سرخ‌رود", "ps" => "سرخ‌رود"],
                            "Spin Ghar" => ["fa" => "سپین‌غر", "ps" => "سپین‌غر"],



                        ]
                    ],
                    "Logar" => [
                        "fa" => "لوگر",
                        "ps" => "لوګر",
                        "District" => [
                            "Pul-e Alam" => ["fa" => "پُل علم", "ps" => "پُل علم"],
                            "Kharwar" => ["fa" => "خرور", "ps" => "خرور"],
                            "Mohammad Agha" => ["fa" => "محمد آغی", "ps" => "محمد آغی"],
                            "Baraki Barak" => ["fa" => "برکی برک", "ps" => "برکی برک"],
                            "Charkh" => ["fa" => "چَرخ ", "ps" => " څرخ"],
                            "Khoshi" => ["fa" => " خوشی", "ps" => " خوښی"],
                            "Azra" => ["fa" => "ازره  ", "ps" => " اَزره"],
                        ]
                    ],
                    "Ghazni" => [
                        "fa" => "غزنی",
                        "ps" => "غزنی",
                        "District" => [
                            "Ghazni" => ["fa" => "غزنی", "ps" => "غزنی"],
                            "Jaghori" => ["fa" => "جاغوری", "ps" => "جاغوری"],
                            "Qarabagh" => ["fa" => "قره باغ", "ps" => "قره باغ"],
                            "Ab Band" => ["fa" => "آب بند", "ps" => "آب بند"],
                            "Ajristan" => ["fa" => "اجرستان", "ps" => "اَجرستان"],
                            "Andar" => ["fa" => "اَندَر", "ps" => "اندړ"],
                            "Deh Yak" => ["fa" => "ده یک", "ps" => "ده‌یک"],
                            "Gelan" => ["fa" => "گېلان", "ps" => "گیلان"],
                            "Giro" => ["fa" => "گیرو", "ps" => "گېرو"],
                            "Jaghatū" => ["fa" => "جَغَتو", "ps" => "جغتو"],
                            "Khogyani" => ["fa" => "خوگیانی", "ps" => "خوگیاڼی "],
                            "Khwaja Umari" => ["fa" => "خواجه‌عُمری", "ps" => "خواجه عمري"],
                            "Malistan" => ["fa" => "مالستان", "ps" => "مالستان"],
                            "Muqur" => ["fa" => "مقر", "ps" => "مقر"],
                            "Nawa" => ["fa" => "ناوه", "ps" => "ناوه"],
                            "Nawur" => ["fa" => "ناور", "ps" => "ناور"],
                            "Rashidan" => ["fa" => "رشیدان", "ps" => "راشیدان"],
                            "Waghaz" => ["fa" => "وغاز", "ps" => "وغاز"],
                            "Zana Khan" => ["fa" => "زنه خان", "ps" => "زنه‌خان"],
                            "Wali-Mohammad Shahid" => ["fa" => " ولي محمد شهید", "ps" => "ولی محمد شهید"],
                        ]
                    ],
                    "Badakhshan" => [
                        "fa" => "بدخشان",
                        "ps" => "بدخشان",
                        "District" => [
                            "Faizabad" => ["fa" => "فیض آباد", "ps" => "فیض آباد"],
                            "Yawan" => ["fa" => "یوان", "ps" => "یوان"],
                            "Khwahan" => ["fa" => "خوایان", "ps" => "خوایان"],
                            "Shahriyir" => ["fa" => "شاه رییر", "ps" => "شاه رییر"],
                            "Arghanj Khwa" => ["fa" => "ارغنجخواه ", "ps" => "اَرغَنج‌خواه"],
                            "Argo" => ["fa" => "اَرگو", "ps" => "ارگو "],
                            "Baharak" => ["fa" => "بهارک", "ps" => "بهارک"],
                            "Darayim" => ["fa" => "درایم", "ps" => "درایم"],
                            "Ishkashim" => ["fa" => "اِشکاشِم", "ps" => "اشکاشم"],
                            "Jurm" => ["fa" => "جُرم", "ps" => "جورم"],
                            "Kishim" => ["fa" => "کِشِم", "ps" => "کشم"],
                            "Kohistan" => ["fa" => "کوهستان", "ps" => "کوهستان"],
                            "Kuf Ab" => ["fa" => "کوف‌آب", "ps" => "کوف آب "],
                            "Keran wa Menjan" => ["fa" => "کُران و مُنجان", "ps" => "کوران و منجان"],
                            "Raghistan" => ["fa" => "راغستان", "ps" => "راغستان"],
                            "Shahri Buzurg" => ["fa" => "شهر بزرگ", "ps" => "شهربزرگ"],
                            "Sheghnan" => ["fa" => "شِغنان", "ps" => "شغنان"],
                            "Shekay" => ["fa" => "شِکی", "ps" => "شېکي"],
                            "Shuhada" => ["fa" => "شهدا ", "ps" => "شهدا "],
                            "Tagab	" => ["fa" => "تگاب ", "ps" => "تگاب "],
                            "Tishkan" => ["fa" => "تیشکان", "ps" => "تېشکان"],
                            "Wakhan" => ["fa" => "واخان", "ps" => "واخان"],
                            "Warduj" => ["fa" => "وَردوج", "ps" => "وردوج"],
                            "Yaftali Sufla" => ["fa" => "یفتلِ پایین", "ps" => "یفتال سفله"],
                            "Yamgan" => ["fa" => "یَمَگان", "ps" => "یمگان "],
                            "Zebak" => ["fa" => "زیباک", "ps" => "زېباک"],
                            "Maymy	" => ["fa" => "میمی ", "ps" => "میمی "],
                            "Nussai	" => ["fa" => "نوسی ", "ps" => "نوسی "],
                            "Koof	" => ["fa" => "کوف ", "ps" => "کوف"],
                            "Khash	" => ["fa" => "خاش ", "ps" => "خاش"],
                        ]
                    ],
                    "Bamyan" => [
                        "fa" => "بامیان",
                        "ps" => "بامیان",
                        "District" => [
                            "Bamyan" => ["fa" => "بامیان", "ps" => "بامیان"],
                            "Waras" => ["fa" => "وراز", "ps" => "وراز"],
                            "Saighan" => ["fa" => "سایغان", "ps" => "سایغان"],
                            "Kahmard" => ["fa" => "کَهمَرد", "ps" => "کهمرد "],
                            "Panjab" => ["fa" => "پنجاب", "ps" => "پنجآب"],
                            "Sayghan" => ["fa" => "سَیغان", "ps" => "سيغان "],
                            "Shibar" => ["fa" => "شیبَر", "ps" => "شیبَر"],
                            "Waras" => ["fa" => "وَرَس", "ps" => "ورس"],
                            "Yakawlang" => ["fa" => "یکاولنگ", "ps" => "يکاولنگ"],
                        ]
                    ],
                    "Samangan" => [
                        "fa" => "سمنگان",
                        "ps" => "سمنگان",
                        "District" => [
                            "Aybak" => ["fa" => "ایبک", "ps" => "ایبک"],
                            "Kohistan" => ["fa" => "کوهستان", "ps" => "کوهستان"],
                            "Dahana-i-Ghori" => ["fa" => "دهن غوری", "ps" => "دهن غوری"],
                            "Darah Sof Balla" => ["fa" => "دره صوف بالا", "ps" => "دره صوفي بالا"],
                            "Darah Sof Payan" => ["fa" => "دره صوف پایین", "ps" => "دره صوفي پایان "],
                            "Feroz Nakhchir	" => ["fa" => "فیروزنَخچیر", "ps" => "فیروز نخچر"],
                            "Hazrat Sultan" => ["fa" => "حضرتِ سلطان", "ps" => "حضرت سلطان"],
                            "Khuram Wa Sarbagh" => ["fa" => "خُرم و سارباغ", "ps" => "خرم او سرباغ"],
                            "Ruyi Du Ab" => ["fa" => "روی دوآب", "ps" => "روی دو آب"],


                        ]
                    ],
                    "Takhar" => [
                        "fa" => "تخار",
                        "ps" => "تخار",
                        "District" => [
                            "Taloqan" => ["fa" => "تالقان", "ps" => "تالقان"],
                            "Dasht Qala" => ["fa" => "داشتی قلعه", "ps" => "داشتی قلعه"],
                            "Yangi Qala" => ["fa" => "یونی قلعه", "ps" => "یونی قلعه"],
                            "Baharak" => ["fa" => "بهارک", "ps" => "بهارک"],
                            "Bangi" => ["fa" => "بَنگی", "ps" => "بنگي"],
                            "Chah Ab" => ["fa" => "چاه‌آب", "ps" => "چاه آب"],
                            "Darqad" => ["fa" => "دَرقَد", "ps" => "درقد"],
                            "Dashti Qala" => ["fa" => "یَنگی‌قلعه", "ps" => "ینگي کلا"],
                            "Farkhar" => ["fa" => "فَرخار", "ps" => "فرخار"],
                            "Hazar Sumuch" => ["fa" => "هزارسَموچ", "ps" => "هزار سموچ"],
                            "Ishkamish" => ["fa" => "اِشکمِش", "ps" => "اشکامش"],
                            "Kalafgan" => ["fa" => "کلفگان", "ps" => "کلفگان"],
                            "Khwaja Bahauddin" => ["fa" => "خواجه بهاوالدین", "ps" => "خواجه بهاوالدین"],
                            "Khwaja Ghar" => ["fa" => "خواجه غار", "ps" => "خواجه غر"],
                            "Namak Ab" => ["fa" => "نمک‌آب", "ps" => "نمک آب"],
                            "Rustaq" => ["fa" => "روستاق", "ps" => "رستاق"],
                            "Warsaj" => ["fa" => "ورساج", "ps" => "ورساج"],
                            "Chaal" => ["fa" => "چال", "ps" => "چال"],
                            "hazar Somuch " => ["fa" => "هزار سموچ", "ps" => "هزار سموچ"],

                        ]
                    ],
                    "Paktia" => [
                        "fa" => "پکتیا",
                        "ps" => "پکتیا",
                        "District" => [
                            "Gardez" => ["fa" => "ګردیز", "ps" => "ګردیز"],
                            "Ahmad Aba" => ["fa" => "احمد آباد ", "ps" => "احمدآباد"],
                            "Laja Ahmad khel" => ["fa" => "لجه احمدخیل", "ps" => " لژه احمد خېل "],
                            "Dand Aw Patan" => ["fa" => "دَند پَتان", "ps" => "ډنډ او پټان"],
                            "Gerda Serai" => ["fa" => "گرده ثیری", "ps" => "گرده ثیری"],
                            "Janikhel District" => ["fa" => "جانی‌خیل", "ps" => "جانيخېل"],
                            "Mirzaka" => ["fa" => "میرزکه", "ps" => "میرزکه"],
                            "Rohani Baba" => ["fa" => "روحاني بابا", "ps" => "روحاني بابا"],
                            "Said Karam" => ["fa" => "سيد کرم", "ps" => "سيد کرم"],
                            "Shwak" => ["fa" => "شواک", "ps" => "شواک"],
                            "Chamkani" => ["fa" => "چَمکَنی", "ps" => "څمکنۍ"],
                            "Zadran" => ["fa" => "زَدران", "ps" => "ځدران"],
                            "Zazi " => ["fa" => "جاجی", "ps" => "ځاځي"],
                            "Zurmat" => ["fa" => "زرمت", "ps" => "زرمت"],
                            "Jaji Ali Khil" => ["fa" => "ځاځي علي خیل", "ps" => "ځاځي علي خیل"],
                            "laja Mangal" => ["fa" => "لجه منگل", "ps" => "لژه منګل"],


                        ]
                    ],
                    "Khost" => [
                        "fa" => "خوست",
                        "ps" => "خوست",
                        "District" => [
                            "Khost" => ["fa" => "خوست", "ps" => "خوست"],
                            "Mandozai" => ["fa" => "مندوزی", "ps" => "مندوزی"],
                            "Zazai Maidan" => ["fa" => "زازای میدان", "ps" => "زازای میدان"],
                            "Bak" => ["fa" => "باک", "ps" => "باک"],
                            "Gurbuz" => ["fa" => "گُربُز", "ps" => "گوربز"],
                            "Jaji Maydan" => ["fa" => "جاجی‌میدان", "ps" => "ځاځي میدان"],
                            "Musa Khel	" => ["fa" => "موسی‌خیل", "ps" => "موسی خېل"],
                            "Nadir Shah Kot" => ["fa" => "نادرشاه‌کوت", "ps" => "نادرشاه کوټ"],
                            "Qalandar" => ["fa" => "قَلَندر", "ps" => "قلندر"],
                            "Sabari" => ["fa" => "صَبری", "ps" => "سبري"],
                            "Shamal" => ["fa" => "شَمَل", "ps" => "شمال"],
                            "Spera" => ["fa" => "سپیره", "ps" => "سپېره"],
                            "Tani" => ["fa" => "تَنی", "ps" => "تڼۍ"],
                            "Tirazayi" => ["fa" => "تیریزائی", "ps" => "تېره زی"],
                            "Matun" => ["fa" => "متون", "ps" => "متون"],
                        ]
                    ],
                    "Paktika" => [
                        "fa" => "پکتیکا",
                        "ps" => "پکتیکا",
                        "District" => [
                            "Sharan" => ["fa" => "شرن", "ps" => "شرن"],
                            "Sarobi" => ["fa" => "سروری", "ps" => "سروری"],
                            "Barmal" => ["fa" => "برمل", "ps" => "برمل"],
                            "Dila" => ["fa" => "دیله", "ps" => "ډیله"],
                            "Gayan" => ["fa" => "گیان", "ps" => "گیان"],
                            "Gomal" => ["fa" => "گومَل", "ps" => "گومال"],
                            "Janikhel" => ["fa" => "جانی‌خیل", "ps" => "جاني خېل"],
                            "Zarghun Shar " => ["fa" => "زرغون‌شهر", "ps" => "زرغون ښار"],
                            "Mata Khan" => ["fa" => "مَتاخان", "ps" => "مټاخان"],
                            "Nika" => ["fa" => "نکه", "ps" => "نېکه"],
                            "Omna" => ["fa" => "اومَنه", "ps" => "اومنا"],
                            "Sar Hawza" => ["fa" => "سرروضه", "ps" => "سر حوزه"],
                            "Surobi" => ["fa" => "سَروبی", "ps" => "سروبي"],
                            "Terwa" => ["fa" => "تَروُو", "ps" => "تېروه"],
                            "Urgun" => ["fa" => "اُرگون", "ps" => "ارگون"],
                            "Wazakhwa" => ["fa" => "وازه‌خواه", "ps" => "وازه خوا"],
                            "Wor Mamay" => ["fa" => "وَرمَمی", "ps" => "ور مامی"],
                            "Yahyakhel" => ["fa" => "یخیی خېل ", "ps" => "یخیی خېل "],
                            "Yusufkhel" => ["fa" => "یوسف خېل ", "ps" => "یوسف خېل "],
                            "Zerok" => ["fa" => "زیروک", "ps" => "زیروک"],
                            "Deela wa Khosmand" => ["fa" => "خوشمند", "ps" => "دیله او خوشمند "],
                            "Khosmand" => ["fa" => "خوشمند", "ps" => "خوشمند"],







                        ]
                    ],
                    "Nimroz" => [
                        "fa" => "نمروز",
                        "ps" => "نمروز",
                        "District" => [
                            "Zaranj" => ["fa" => "زرنج", "ps" => "زرنج"],
                            "Khash Rod" => ["fa" => "خرش رود", "ps" => "خرش رود"],
                            "Chahar Burjak" => ["fa" => "چهاربُرجک", "ps" => "چاربورجک"],
                            "Chakhansur" => ["fa" => "چَخانسور", "ps" => "چخانسور"],
                            "Kang" => ["fa" => "کَنگ", "ps" => "کنگ"],
                            "Delaram" => ["fa" => "دل آرام", "ps" => "دل آرام"],
                        ]
                    ],
                    "Urozgan" => [
                        "fa" => "اُروزگان",
                        "ps" => "اُروزگان",
                        "District" => [
                            "Tarin Kot" => ["fa" => " ترین‌کوت", "ps" => "ترین کوټ"],
                            "Deh Rawud" => ["fa" => "ده راود", "ps" => "ده راود"],
                            "Chora" => ["fa" => "چوره", "ps" => "چوره"],
                            "Khas Uruzgan" => ["fa" => "خاص‌ارزگان", "ps" => "خاص اروزگان"],
                            "Shahidi Hassas" => ["fa" => "شهید حساس", "ps" => "شهيدې حساس"],
                            "Gizab" => ["fa" => "گیزاب", "ps" => "ګیزاب"],
                            "Chinar Tu" => ["fa" => "چنار تو", "ps" => "چنار تو"],
                            "Chahar Chinah" => ["fa" => "چهار چینه", "ps" => "چهار چینه"],
                        ]
                    ],
                    "Daykundi" => [
                        "fa" => "دایکندی",
                        "ps" => "دایکندی",
                        "District" => [
                            "Nili" => ["fa" => "نیلی", "ps" => "نیلی"],
                            "Kiti" => ["fa" => "کتی", "ps" => "کتی"],
                            "Ishtarlay" => ["fa" => "اَشتَرَلی", "ps" => "اشتارلي"],
                            "Kajran" => ["fa" => "کِجران", "ps" => "کجران "],
                            "Khadir " => ["fa" => "خِدیر", "ps" => "خادر "],
                            "Miramor" => ["fa" => "میرامور", "ps" => "میرامور"],
                            "Sangtakht" => ["fa" => "سنگِ تخت", "ps" => "سنگ تخت"],
                            "Shahristan" => ["fa" => "شهرستان", "ps" => "شهرستان"],
                            "Patoo " => ["fa" => "پاتو", "ps" => "پاتو"],


                        ]
                    ],
                    "Badghis" => [
                        "fa" => "بدخشانی",
                        "ps" => "بدخشانی",
                        "District" => [
                            "Qala-i-Naw" => ["fa" => "قلعه نو", "ps" => "قلعه نو"],
                            "Murghab" => ["fa" => "مرغاب", "ps" => "مرغاب"],
                            "Jawand" => ["fa" => "جواند", "ps" => "جواند"],
                            "Ab Kamari " => ["fa" => "آب‌کَمَری", "ps" => "آبکمري"],
                            "Ghormach " => ["fa" => "غورماچ", "ps" => "غورماچ"],
                            "Muqur " => ["fa" => "مُقُر", "ps" => "مقر"],
                            "Bala Murghab " => ["fa" => "بالا مرغاب", "ps" => "بالا مرغاب"],
                            "Qadis " => ["fa" => "قادِس", "ps" => "قاديس"],

                        ]
                    ],
                    "Ghor" => [
                        "fa" => "غور",
                        "ps" => "غور",
                        "District" => [
                            "Chaghcharan" => ["fa" => "چغچران", "ps" => "چغچران"],
                            "Lal wa Sarjangal" => ["fa" => "لال و سرجنگل", "ps" => "لال و سرجنگل"],
                            "Marghab " => ["fa" => "مرغاب", "ps" => "مرغاب"],
                            "Charsada " => ["fa" => "چارسده", "ps" => "چارسده "],
                            "Dawlat Yar " => ["fa" => "دولت یار", "ps" => "دولت یار"],
                            "Du Layna " => ["fa" => "دولینه", "ps" => "دو لاینه"],
                            "Pasaband " => ["fa" => "پسابند", "ps" => "پسابند"],
                            "Saghar " => ["fa" => "ساغر", "ps" => "ساغر"],
                            "Shahrak " => ["fa" => "شهرک", "ps" => "شهرک"],
                            "Taywara " => ["fa" => "تیوره", "ps" => "تایواره"],
                            "Tulak " => ["fa" => "تولک", "ps" => "تولک"],
                            "Feroz Koh " => ["fa" => "فیروز کوه", "ps" => "فیروز کوه"],
                        ]
                    ],
                    "Sar-e Pol" => [
                        "fa" => "سرپل",
                        "ps" => "سرپل",
                        "District" => [
                            "Sar-e Pol" => ["fa" => "سرپل", "ps" => "سرپل"],
                            "Kohistanat" => ["fa" => "کوهستانات", "ps" => "کوهستانات"],
                            "Balkhab" => ["fa" => "بلخاب", "ps" => "بلخاب"],
                            "Gosfandi" => ["fa" => "گوسفندی", "ps" => "گوسفندي "],
                            "Sangcharak" => ["fa" => "سانچارک", "ps" => "سنگچارک"],
                            "Sayyad" => ["fa" => "صیاد", "ps" => "سیاد"],
                            "Sozma Qala" => ["fa" => "سرپل", "ps" => "سوزمه کلا"],
                            "Al jehad" => ["fa" => "الجهاد", "ps" => "الجهاد"],
                            "Said Abad" => ["fa" => "سید آباد", "ps" => "سید آباد"],
                            "Al Fath" => ["fa" => "الجهاد", "ps" => "الفتح"],
                            "Al Badri" => ["fa" => "البدري", "ps" => "البدري"],

                        ]
                    ],
                    "Faryab" => [
                        "fa" => "فاریاب",
                        "ps" => "فاریاب",
                        "District" => [
                            "Maymana" => ["fa" => "مینه", "ps" => "مینه"],
                            "Andkhoi" => ["fa" => "اندخوی", "ps" => "اندخوی"],
                            "Ghowchak" => ["fa" => "غوچک", "ps" => "غوچک"],
                            "Almar" => ["fa" => "اَلمار", "ps" => "الیمار"],
                            "Bilchiragh" => ["fa" => "بُلچراغ", "ps" => "بېلچراغ"],
                            "Dawlat Abad" => ["fa" => "دولت‌آباد", "ps" => "دولت اباد"],
                            "Gurziwan" => ["fa" => "گَرزیوان", "ps" => "گورزیوان"],
                            "Khani Chahar Bagh" => ["fa" => "خانه چارباغ", "ps" => "خانه چارباغ"],
                            "Khwaja Sabz Posh" => ["fa" => "خواجه سبزپوش ولی", "ps" => "خواجه سبز پوش"],
                            "Kohistan" => ["fa" => "کوهستان", "ps" => "کوهستان"],
                            "Pashtun Kot" => ["fa" => "پشتون‌کوت", "ps" => "پښتونکوټ"],
                            "Qaramqol" => ["fa" => "قَرَم‌قُل", "ps" => "قرمگل"],
                            "Qaysar" => ["fa" => "قیصار", "ps" => "قیصار"],
                            "Qurghan" => ["fa" => "قَرغان", "ps" => "قرغان"],
                            "Shirin Tagab" => ["fa" => "شیرین‌تَگاب", "ps" => "شیرین تگاب"],

                        ]
                    ],
                    "Panjshir" => [
                        "fa" => "پنجشیر",
                        "ps" => "پنجشیر",
                        "District" => [
                            "Bazarak" => ["fa" => "بازارک", "ps" => "بازارک"],
                            "Shahristan" => ["fa" => "شهریستان", "ps" => "شهریستان"],
                            "Anaba" => ["fa" => "اَنابه", "ps" => "انابه "],
                            "Darah " => ["fa" => "دره ", "ps" => "دره "],
                            "Khenj" => ["fa" => "خِنج", "ps" => "خنج"],
                            "Paryan" => ["fa" => "پریان", "ps" => "پریان"],
                            "Rokha" => ["fa" => "روخه", "ps" => "روخه "],
                            "Shotul" => ["fa" => "شُتُل", "ps" => "شوتل"],
                            "Abshar" => ["fa" => "ابشار", "ps" => "ابشار"],
                            "Hais Awall" => ["fa" => "حصه اول", "ps" => "اوله حصه"],
                        ]
                    ],
                    "Parwan" => [
                        "fa" => "پروان",
                        "ps" => "پروان",
                        "District" => [
                            "Bagram" => ["fa" => "بَگرام", "ps" => "بَگرام"],
                            "Charikar" => ["fa" => "چاریکار", "ps" => "چاریکار"],
                            "Ghorband" => ["fa" => "غوربند", "ps" => "غوربند"],
                            "Jabul Saraj" => ["fa" => "جبل سراج", "ps" => "جبل‌سراج"],
                            "Kohi Safi" => ["fa" => "کوهِ صافی", "ps" => "کوه سافي"],
                            "Salang" => ["fa" => "سالَنگ", "ps" => "
                                سالنگ"],
                            "Sayed Khel " => ["fa" => "سیدخیل", "ps" => "سید خیل "],
                            "Sheikh Ali" => ["fa" => " شیخ علي", "ps" => " شیخ علي"],
                            "Shinwari" => ["fa" => "شینواری", "ps" => "شینواري"],
                            "Surkhi Parsa" => ["fa" => "سرخِ پارسا", "ps" => "سرخ پارسا"],
                            "Sia Gerd " => ["fa" => "سیاه گرد", "ps" => "تور گرد"],



                        ]
                    ],

                    "Maidan Wardak" => [
                        "fa" => " میدان وردگ",
                        "ps" => " میدان وردگ",
                        "District" => [
                            "Chaki" => ["fa" => "چکِ وردک", "ps" => "چک"],
                            "Day Mirdad" => ["fa" => "دایمیرداد", "ps" => "دايمرداد"],
                            "Bihsud" => ["fa" => "بهسود", "ps" => "بهسود "],
                            "Jaghatu " => ["fa" => "جغتو ", "ps" => "جغتو "],
                            "Jalrez" => ["fa" => "جلریز", "ps" => "جلريز"],
                            "Markazi Bihsud" => ["fa" => "مرکزِ بهسود", "ps" => "مرکزي بهسود"],
                            "Maydan Shahr" => ["fa" => "میدان شار", "ps" => "ميدان ښار "],
                            "Nirkh" => ["fa" => "نِرخ", "ps" => "نرخ"],
                            "Saydabad" => ["fa" => "سیدآباد", "ps" => "سيد آباد"],

                        ]
                    ],

                    "Nuristan" => [
                        "fa" => "نورستان",
                        "ps" => "نورستان",
                        "District" => [
                            "Bargi Matal" => ["fa" => "برگِ مَتال", "ps" => "برگېمټال"],
                            "Du Ab" => ["fa" => "دوآب", "ps" => "دو آب "],
                            "Kamdesh" => ["fa" => "کامدیش", "ps" => "کامدېش "],
                            "Mandol " => ["fa" => "مَندول ", "ps" => "منډول "],
                            "Nurgaram " => ["fa" => "نورگرام ", "ps" => "نورگرام "],
                            "Parun" => ["fa" => "پارون", "ps" => "پارون"],
                            "Wama" => ["fa" => "واما", "ps" => "واما "],
                            "Waygal" => ["fa" => "وایگَل", "ps" => "وایگل"],

                        ]
                    ],

                    "Helmand " => [
                        "fa" => " هلمند",
                        "ps" => "هلمند",
                        "District" => [
                            "Baghran" => ["fa" => "بَغران", "ps" => "باغران"],
                            "Dishu" => ["fa" => "دیشو", "ps" => "دیشو"],
                            "Garmsir" => ["fa" => "گرمسیر", "ps" => "گرمسېر "],
                            "Grishk " => ["fa" => "گريشک ", "ps" => "گريشک "],
                            "Kajaki" => ["fa" => "کَجَکی", "ps" => "کجکي"],
                            "Khanashin" => ["fa" => "خان‌نشین", "ps" => "خانېشين"],
                            "Lashkargah" => ["fa" => "لشکرگاه", "ps" => "لښکرگاه "],
                            "Nad Ali" => ["fa" => "نادعلی", "ps" => "نادعلي"],
                            "Musa Qala" => ["fa" => "موسی‌قلعه", "ps" => "موسی کلا"],
                            "Nawa-I-Barakzayi" => ["fa" => "ناوهٔ بارکزائی", "ps" => "نوی بارکزی"],
                            "Nawzad" => ["fa" => "نوزاد", "ps" => "نوزاد"],
                            "Sangin" => ["fa" => "سَنگین", "ps" => "سنگین"],
                            "Washir" => ["fa" => "واشیر", "ps" => "واشېر"],
                            "Marjah" => ["fa" => "مرجح", "ps" => "مرجح"],
                            "Nahr -E- Seraj" => ["fa" => "نهر سراج", "ps" => "نهر سراج"],
                            "Naw mish" => ["fa" => "ناو میش", "ps" => "ناو میش"],
                            "Nawa" => ["fa" => "ناوه", "ps" => "ناوه"],


                        ]
                    ],

                    "Zabul" => [
                        "fa" => " زابل",
                        "ps" => "زابل",
                        "District" => [
                            "Argahandab" => ["fa" => "اَرغَنداب", "ps" => "ارغنداب"],
                            "Atghar" => ["fa" => "اَتغَر", "ps" => "اټغار"],
                            "Daychopan" => ["fa" => "دای چوپان", "ps" => "دای چوپان "],
                            "Kakar " => ["fa" => "کاکَر ", "ps" => "کاکړ "],
                            "Mezana" => ["fa" => "میزان", "ps" => "میزان"],
                            "Naw Bahar" => ["fa" => "نوبهار", "ps" => "نو بجر "],
                            "Qalat" => ["fa" => "قَلات", "ps" => "قلات "],
                            "Shamulzayi" => ["fa" => "شمولزی", "ps" => " شمولزی"],
                            " Shinkay" => ["fa" => "شینکی", "ps" => " شینکی"],
                            "Tarnak Wa Jaldak" => ["fa" => "ترنک او جلدک", "ps" => "ترنک او جلدک "],
                            "Shah joyi" => ["fa" => "شاه جویی", "ps" => "شاه جویي "],


                        ]
                    ],

                    "Farah " => [
                        "fa" => " فراه",
                        "ps" => "فراه",
                        "District" => [
                            "Anar Dara" => ["fa" => "انار دره", "ps" => "انار دره"],
                            "Bakwa" => ["fa" => "شهریستان", "ps" => "شهریستان"],
                            "Anaba" => ["fa" => "بَکواه", "ps" => "بکوا "],
                            "Bala Buluk " => ["fa" => "بالابلوک ", "ps" => "بالا بلوک "],
                            "Farah" => ["fa" => "فراه
                                ", "ps" => "فراه
                                "],
                            "Gulistan" => ["fa" => "گلستان", "ps" => "گلستان"],
                            "Khaki Safed" => ["fa" => "خاک سفېد", "ps" => "خاک سفېد "],
                            "Lash wa Juwayn" => ["fa" => "لاش و جُوَین", "ps" => "د لاش او جواین"],
                            "Pur Chaman" => ["fa" => "پرچمن", "ps" => "پر چمن"],
                            "Pusht Rod" => ["fa" => "پُشت‌رود", "ps" => "پشت رود"],
                            "Qala i Kah" => ["fa" => "قلعهٔ کاه", "ps" => "قلعه کاه"],
                            "Shib Koh" => ["fa" => "شیب‌کوه", "ps" => "شېب کوه"],

                        ]
                    ],

                    "Laghman " => [
                        "fa" => " لَغمان",
                        "ps" => " لَغمان",
                        "District" => [
                            "Alingar" => ["fa" => "علینگار", "ps" => "الینگار"],
                            "Alishing" => ["fa" => "علیشِنگ", "ps" => "الیشنگ"],
                            "Mihtarlam" => ["fa" => "مهترلام", "ps" => "مهترلام "],
                            "Dawlat Shah " => ["fa" => "دولت‌شاه ", "ps" => "دولتشاه "],
                            "Qarghayi" => ["fa" => "قرغیي", "ps" => "قرغیي"],
                            "Bad pokh" => ["fa" => "باد پوخ", "ps" => "باد پوښ"],
                            "Spinghar" => ["fa" => "سپین غر", "ps" => "سپین غر"],


                        ]
                    ],

                    "Kunar" => [
                        "fa" => " کنړ",
                        "ps" => "کنړ",
                        "District" => [
                            "Asadabad" => ["fa" => "اسد اباد", "ps" => "اسد اباد"],
                            "Bar Kunar" => ["fa" => "بَرکُنر", "ps" => "بر کنړ"],
                            "Chapa Dara" => ["fa" => "چپه‌دره", "ps" => "چپه دره "],
                            "Chawkay " => ["fa" => "چوکی ", "ps" => "څوکۍ "],
                            "Dangam" => ["fa" => "دانگام", "ps" => "دانگام"],
                            "Dara-I-Pech" => ["fa" => "دره‌پیچ", "ps" => "پېچ دره"],
                            "Nurgal" => ["fa" => "نورگُل", "ps" => "نورگل "],
                            "Khas Kunar" => ["fa" => "خاص‌کُنر", "ps" => "خاص کنړ"],
                            "Marawara" => ["fa" => "مَرَوَره", "ps" => "مروره"],
                            "Narang Wa Badil" => ["fa" => "نَرَنگ", "ps" => "نرنگ و باډېل"],
                            "Nari" => ["fa" => "ناری", "ps" => "ناړۍ"],
                            "Shaigal" => ["fa" => "شیگل", "ps" => "شیگل "],
                            "Sirkanai " => ["fa" => "سرکانی", "ps" => "سرکاڼو"],
                            "Wata Pur " => ["fa" => "وَتَه‌پور", "ps" => "وټه پور"],
                            "Ghazi Abad" => ["fa" => "غازي اباد", "ps" => "غازي آباد"],
                            "Narang" => ["fa" => "نارنج", "ps" => "نارنج "],


                        ]
                    ],

                    "Kapisa" => [
                        "fa" => " کاپيسا",
                        "ps" => "کاپيسا",
                        "District" => [
                            "Alasay" => ["fa" => "اَلِه‌سائی", "ps" => "آلاسای"],
                            "Hesa Awal Kohistan" => ["fa" => "حصهٔ اول کوهستان", "ps" => "حصه اول کوهستان"],
                            "Hesa Duwum Kohistan " => ["fa" => "حصه دوم کوهستان ", "ps" => "حصه دوم کوهستان  "],
                            "Koh Band " => ["fa" => "کوه‌بند ", "ps" => "کوه بند "],
                            "Mahmud Raqi" => ["fa" => "محمود راقی", "ps" => "محمود راقي"],
                            "Nijrab" => ["fa" => "نَجراب", "ps" => "نجراب"],
                            "Tagab" => ["fa" => "تَگاب", "ps" => "تګاب "],


                        ]
                    ],

                    "Jowzjan" => [
                        "fa" => " جوزجان",
                        "ps" => "جوزجان",
                        "District" => [
                            "Aqcha" => ["fa" => "آقچه", "ps" => "آقچه"],
                            "Darzab" => ["fa" => "دَرزاب", "ps" => "درزاب"],
                            "Fayzabad" => ["fa" => "فیض‌آباد", "ps" => "فیض آباد "],
                            "Khamyab " => ["fa" => "خمیاب ", "ps" => "خمیاب "],
                            "Khaniqa" => ["fa" => "خانقاه", "ps" => "خانیقا"],
                            "Khwaja Du Koh" => ["fa" => "خواجه دوکوه", "ps" => "خواجه دو کوه"],
                            "Mardyan" => ["fa" => "مَردیان", "ps" => "مردیان "],
                            "Mingajik" => ["fa" => "مِنگَجِک", "ps" => "مینگاجیک"],
                            "Qarqin" => ["fa" => "قَرقین", "ps" => "قرقین"],
                            "Qush Tepa" => ["fa" => "قوش‌تپه", "ps" => "قش تپه"],
                            "Shibirghan" => ["fa" => "شِبِرغان", "ps" => "شبرغان"],





                        ]
                    ],

                    "Kunduz " => [
                        "fa" => " کندوز ",
                        "ps" => "کندوز",
                        "District" => [
                            "Aliabad" => ["fa" => "علي آباد", "ps" => "علي آباد"],
                            "Archi" => ["fa" => "ارچي", "ps" => "ارچي"],
                            "Char Dara" => ["fa" => "چهاردره", "ps" => "چاردره "],
                            "Imam Sahib " => ["fa" => "امام‌صاحب ", "ps" => "امام صيب "],
                            "Khan Abad" => ["fa" => "خان‌آباد", "ps" => "خان آباد"],
                            "Kunduz" => ["fa" => "کندوز", "ps" => "کندوز"],
                            "Qalay-I-Zal" => ["fa" => "قلعهٔ‌ذال", "ps" => "قلا زال "],


                        ]
                    ],

                    "Baghlan " => [
                        "fa" => " بغلان",
                        "ps" => "بغلان",
                        "District" => [
                            "Andarab" => ["fa" => "اندراب", "ps" => "اندراب"],
                            "Baghlani Jadid" => ["fa" => "بغلان جدید", "ps" => "نوی بغلان "],
                            "Burka" => ["fa" => "برکه", "ps" => "برکه "],
                            "Dahana-e-Ghuri " => ["fa" => "دهنه غوری
                                ", "ps" => "دهنه غوري"],
                            "Dih Salah" => ["fa" => "ده صلاح", "ps" => "ده صالح"],
                            "Dushi" => ["fa" => "دوشی", "ps" => "دوشي"],
                            "Farang Wa Gharu" => ["fa" => "فرنگ و غرو", "ps" => "فرنگ او غارو "],
                            "Guzargahi Nur" => ["fa" => "گذرگاه نور", "ps" => "گذرگاه نور"],
                            "Khinjan" => ["fa" => "خنجان", "ps" => "خنجان "],
                            "Khost Wa Fereng" => ["fa" => "خوست و فرنگ", "ps" => "خوست او فرنگ "],
                            "Khwaja Hijran (Jalga)" => ["fa" => "خواجه هجرت (جلگه)", "ps" => "خواجه هجران "],
                            "Nahrin" => ["fa" => "نهرین", "ps" => "ناهرين "],
                            "Puli Hisar" => ["fa" => "پل حصار", "ps" => "پل حصار "],
                            "Puli Khumri" => ["fa" => "	پل خمری", "ps" => "پلخمري "],
                            "Tala wa Barfak" => ["fa" => "تاله او برفک ", "ps" => "تاله او برفک "],
                            "Bano" => ["fa" => "بانو", "ps" => "بانو"],
                            "Doshi" => ["fa" => "دوشی", "ps" => "دوشي"],
                            "Khwaja Hejran" => ["fa" => "بانخواجه هجرانو", "ps" => "خواجه هجران"],




                        ]
                    ],


                ]
            ],
            "United States" => [
                "fa" => "ایالات متحده",
                "ps" => "متحده ایالات",
                "nationality" => [
                    "en" => "American",
                    "fa" => "امریکایی",
                    "ps" => "آمریکایی",

                ],
                "provinces" => []
            ],

            "United Kingdom" => [
                "fa" => "بریتانیا",
                "ps" => "بریتانیا",
                "nationality" => [
                    "en" => "British",
                    "fa" => "برتانیایی",
                    "ps" => "بریتانیایی",

                ],
                "provinces" => []
            ],

            "Canada" => [
                "fa" => "کانادا",
                "ps" => "کاناډا",
                "nationality" => [
                    "en" => "Canadian",
                    "fa" => "کانادایی",
                    "ps" => "کاناډایی",

                ],
                "provinces" => []

            ],

            "Germany" => [
                "fa" => "آلمان",
                "ps" => "جرمني",
                "nationality" => [
                    "en" => "German",
                    "fa" => "آلمانی",
                    "ps" => "آلمانی",

                ],
                "provinces" => []

            ],

            "France" => [
                "fa" => "فرانسه",
                "ps" => "فرانسه",
                "nationality" => [
                    "en" => "French",
                    "fa" => "فرانسوی",
                    "ps" => "فرانسوی",

                ],
                "provinces" => []

            ],

            "Italy" => [
                "fa" => "ایتالیا",
                "ps" => "ایټالیا",
                "nationality" => [
                    "en" => "Italian",
                    "fa" => "ایتالیایی",
                    "ps" => "ایټالوی",

                ],
                "provinces" => []

            ],

            "Spain" => [
                "fa" => "اسپانیا",
                "ps" => "هسپانیا",
                "nationality" => [
                    "en" => "Spanish",
                    "fa" => "اسپانیایی",
                    "ps" => "اسپانیایی",

                ],
                "provinces" => []

            ],

            "China" => [
                "fa" => "چین",
                "ps" => "چین",
                "nationality" => [
                    "en" => "Chinese",
                    "fa" => "چینایی",
                    "ps" => "چینایی",

                ],
                "provinces" => []

            ],

            "Japan" => [
                "fa" => "جاپان",
                "ps" => "جاپان",
                "nationality" => [
                    "en" => "Japanese",
                    "fa" => "جاپانی",
                    "ps" => "جاپانی",

                ],
                "provinces" => []

            ],

            "Russia" => [
                "fa" => "روسیه",
                "ps" => "روسیه",
                "nationality" => [
                    "en" => "Russian",
                    "fa" => "روسی",
                    "ps" => "روسی",

                ],
                "provinces" => []

            ],
            "Iran" => [
                "fa" => "ایران",
                "ps" => "ایران",
                "nationality" => [
                    "en" => "Iranian",
                    "fa" => "ایرانی",
                    "ps" => "ایرانی",

                ],
                "provinces" => []

            ],

            "Pakistan" => [
                "fa" => "پاکستان",
                "ps" => "پاکستان",
                "nationality" => [
                    "en" => "Pakistani",
                    "fa" => "پاکستانی",
                    "ps" => "پاکستانی",

                ],
                "provinces" => []

            ],

            "Turkey" => [
                "fa" => "ترکیه",
                "ps" => "ترکیه",
                "nationality" => [
                    "en" => "Turkish",
                    "fa" => "ترکی",
                    "ps" => "ترکی",

                ],
                "provinces" => []

            ],

            "Egypt" => [
                "fa" => "مصر",
                "ps" => "مصر",
                "nationality" => [
                    "en" => "Egyptian",
                    "fa" => "مصری",
                    "ps" => "مصری",

                ],
                "provinces" => []

            ],

            "Brazil" => [
                "fa" => "برزیل",
                "ps" => "برزیل",
                "nationality" => [
                    "en" => "Brazilian",
                    "fa" => "برازیلی",
                    "ps" => "برازیلی",

                ],
                "provinces" => []

            ],

            "Mexico" => [
                "fa" => "مکسیکو",
                "ps" => "مکسیکو",
                "nationality" => [
                    "en" => "Mexican",
                    "fa" => "میکسیکویی",
                    "ps" => "میکسیکویي",

                ],
                "provinces" => []

            ],

            "Australia" => [
                "fa" => "استرالیا",
                "ps" => "استرالیا",
                "nationality" => [
                    "en" => "Australian",
                    "fa" => "استرالیایی",
                    "ps" => "استرالیایی",

                ],
                "provinces" => []

            ],

            "Argentina" => [
                "fa" => "ارجنټاین",
                "ps" => "آرژانتین",
                "nationality" => [
                    "en" => "Argentine",
                    "fa" => "آرژانتینی",
                    "ps" => "آرژانتینی",

                ],
                "provinces" => []

            ],

            "Bangladesh" => [
                "fa" => "بنگلادش",
                "ps" => "بنګله دېش",
                "nationality" => [
                    "en" => "Bangladeshi",
                    "fa" => "بنگلادشی",
                    "ps" => "بنگلادشی",

                ],
                "provinces" => []

            ],

            "Belgium" => [
                "fa" => "بیلجیم",
                "ps" => "بیلجیم",
                "nationality" => [
                    "en" => "Belgian",
                    "fa" => "بیلجیمي",
                    "ps" => "بیلجیمي",

                ],
                "provinces" => []

            ],

            "Netherlands" => [
                "fa" => "هلندی",
                "ps" => "هالنډي",
                "nationality" => [
                    "en" => "Dutch",
                    "fa" => "هالندی",
                    "ps" => "هالندی",

                ],
                "provinces" => []

            ],

            "Sweden" => [
                "fa" => "سویډن",
                "ps" => "سویډن",
                "nationality" => [
                    "en" => "Swedish",
                    "fa" => "سویډني",
                    "ps" => "سویډني",

                ],
                "provinces" => []

            ],

            "Norway" => [
                "fa" => "ناروې",
                "ps" => "ناروې",
                "nationality" => [
                    "en" => "Norwegian",
                    "fa" => "نارویجی",
                    "ps" => "نارویجی",

                ],
                "provinces" => []

            ],

            "Denmark" => [
                "fa" => "دانمارک",
                "ps" => "ډنمارک",
                "nationality" => [
                    "en" => "Danish",
                    "fa" => "دانمارکی",
                    "ps" => "ډنمارکي",

                ],
                "provinces" => []

            ],

            "Finland" => [
                "fa" => "فنلاند",
                "ps" => "فنلنډ",
                "nationality" => [
                    "en" => "Finnish",
                    "fa" => "فنلندی",
                    "ps" => "فنلنډي",

                ],
                "provinces" => []

            ],

            "Switzerland" => [
                "fa" => "سویس",
                "ps" => "سوئیس",
                "nationality" => [
                    "en" => "Swiss",
                    "fa" => "سویسی",
                    "ps" => "سویسي",

                ],
                "provinces" => []

            ],

            "Austria" => [
                "fa" => "اتریش",
                "ps" => "آستریا",
                "nationality" => [
                    "en" => "Austrian",
                    "fa" => "اتریشی",
                    "ps" => "اتریشي",

                ],
                "provinces" => []

            ],

            "Poland" => [
                "fa" => "پولنډ",
                "ps" => "پولنډ",
                "nationality" => [
                    "en" => "Polish",
                    "fa" => "پولندی",
                    "ps" => "پولنډی",

                ],
                "provinces" => []

            ],

            "Portugal" => [
                "fa" => "پرتغال",
                "ps" => "پرتګال",
                "nationality" => [
                    "en" => "Portuguese",
                    "fa" => "پرتغالی",
                    "ps" => "پرتغالی",

                ],
                "provinces" => []

            ],

            "Greece" => [
                "fa" => "یونان",
                "ps" => "یونان",
                "nationality" => [
                    "en" => "Greek",
                    "fa" => "یونانی",
                    "ps" => "یوناني",

                ],
                "provinces" => []

            ],

            "Ukraine" => [
                "fa" => "اوکراین",
                "ps" => "اوکراین",
                "nationality" => [
                    "en" => "Ukrainian",
                    "fa" => "اوکرایني",
                    "ps" => "اوکرایني",

                ],
                "provinces" => []

            ],

            "South Korea" => [
                "fa" => "کره جنوبی",
                "ps" => "جنوبي کوریا",
                "nationality" => [
                    "en" => "Korean",
                    "fa" => "کوریایي",
                    "ps" => "کوریایي",

                ],
                "provinces" => []

            ],

            "North Korea" => [
                "fa" => "کوریا شمالی",
                "ps" => "کوریا شمالی",
                "nationality" => [
                    "en" => "North Korean",
                    "fa" => "کوریا شمالی",
                    "ps" => "کوریا شمالی",

                ],
                "provinces" => []

            ],

            "Thailand" => [
                "fa" => "تایلند",
                "ps" => "تایلینډ",
                "nationality" => [
                    "en" => "Thai",
                    "fa" => "تایلندی",
                    "ps" => "تايلنډی",

                ],
                "provinces" => []

            ],

            "Vietnam" => [
                "fa" => "ویتنام",
                "ps" => "ویتنام",
                "nationality" => [
                    "en" => "Vietnamese",
                    "fa" => "ویتنامی",
                    "ps" => "ویتنامی",

                ],
                "provinces" => []

            ],

            "Indonesia" => [
                "fa" => "اندونیزیا",
                "ps" => "اندونیزیا",
                "nationality" => [
                    "en" => "Indonesian",
                    "fa" => "اندونزیایی",
                    "ps" => "اندونیزیایي",

                ],
                "provinces" => []

            ],

            "Malaysia" => [
                "fa" => "مالیزیا",
                "ps" => "مالیزیا",
                "nationality" => [
                    "en" => "Malaysian",
                    "fa" => "مالزیایی",
                    "ps" => "مالیزیایي",

                ],
                "provinces" => []

            ],

            "Philippines" => [
                "fa" => "فیلیپین",
                "ps" => "فیلیپین",
                "nationality" => [
                    "en" => "Filipino",
                    "fa" => "فیلیپینی",
                    "ps" => "فلیپیني",

                ],
                "provinces" => []

            ],

            "Iraq" => [
                "fa" => "عراق",
                "ps" => "عراق",
                "nationality" => [
                    "en" => "Iraqi",
                    "fa" => "عراقی",
                    "ps" => "عراقي",

                ],
                "provinces" => []

            ],

            "Syria" => [
                "fa" => "سوریه",
                "ps" => "سوریه",
                "nationality" => [
                    "en" => "Syrian",
                    "fa" => "سوریایی",
                    "ps" => "سوریایي",

                ],
                "provinces" => []

            ],

            "Jordan" => [
                "fa" => "اردن",
                "ps" => "اردن",
                "nationality" => [
                    "en" => "Jordanian",
                    "fa" => "اردنی",
                    "ps" => "اردني",

                ],
                "provinces" => []

            ],

            "Lebanon" => [
                "fa" => "لبنان",
                "ps" => "لبنان",
                "nationality" => [
                    "en" => "Lebanese",
                    "fa" => "لبنانی",
                    "ps" => "لبناني",

                ],
                "provinces" => []

            ],

            "Qatar" => [
                "fa" => "قطر",
                "ps" => "قطر",
                "nationality" => [
                    "en" => "Qatari",
                    "fa" => "قطری",
                    "ps" => "قطري",

                ],
                "provinces" => []

            ],

            "UAE" => [
                "fa" => "امارات متحده عربی",
                "ps" => "متحده عربي امارات",
                "nationality" => [
                    "en" => "Emirati",
                    "fa" => "اماراتی",
                    "ps" => "اماراتي",

                ],
                "provinces" => []

            ],

            "Kuwait" => [
                "fa" => "کویت",
                "ps" => "کویت",
                "nationality" => [
                    "en" => "Kuwaiti",
                    "fa" => "کویتی",
                    "ps" => "کویتي",

                ],
                "provinces" => []

            ],

            "Oman" => [
                "fa" => "عمان",
                "ps" => "عمان",
                "nationality" => [
                    "en" => "Omani",
                    "fa" => "عمانی",
                    "ps" => "عماني",

                ],
                "provinces" => []

            ],

            "Yemen" => [
                "fa" => "یمن",
                "ps" => "یمن",
                "nationality" => [
                    "en" => "Yemeni",
                    "fa" => "یمنی",
                    "ps" => "یمني",

                ],
                "provinces" => []

            ],

            "Sudan" => [
                "fa" => "سودان",
                "ps" => "سودان",
                "nationality" => [
                    "en" => "Sudanese",
                    "fa" => "سودانی",
                    "ps" => "سوداني",

                ],
                "provinces" => []

            ],

            "South Africa" => [
                "fa" => "آفریقای جنوبی",
                "ps" => "جنوبي افریقا",
                "nationality" => [
                    "en" => "South African",
                    "fa" => "آفریقای جنوبی",
                    "ps" => "جنوبي افريقايي",

                ],
                "provinces" => []

            ],

            "Kenya" => [
                "fa" => "کنیا",
                "ps" => "کنیا",
                "nationality" => [
                    "en" => "Kenyan",
                    "fa" => "کینيایي",
                    "ps" => "کینيایي",

                ],
                "provinces" => []

            ],

            "Nigeria" => [
                "fa" => "نایجیریا",
                "ps" => "نایجیریا",
                "nationality" => [
                    "en" => "Nigerian",
                    "fa" => "نایجریایي",
                    "ps" => "نایجریایي",

                ],
                "provinces" => []


            ],

            "Morocco" => [
                "fa" => "مراکش",
                "ps" => "مراکش",
                "nationality" => [
                    "en" => "Moroccan",
                    "fa" => "مراکشی",
                    "ps" => "مراکشي",

                ],
                "provinces" => []

            ],

            "Tunisia" => [
                "fa" => "تونس",
                "ps" => "تونس",
                "nationality" => [
                    "en" => "Tunisian",
                    "fa" => "تونسی",
                    "ps" => "تونسې",

                ],
                "provinces" => []

            ],

            "Algeria" => [
                "fa" => "الجزایر",
                "ps" => "الجزایر",
                "nationality" => [
                    "en" => "Algerian",
                    "fa" => "الجزایری",
                    "ps" => "الجریایي",

                ],
                "provinces" => []

            ],

            "Angola" => [
                "fa" => "انګولا",
                "ps" => "آنگولا",
                "nationality" => [
                    "en" => "Angolan",
                    "fa" => "آنگولایی",
                    "ps" => "انګولايي",

                ],
                "provinces" => []

            ],

            "Mozambique" => [
                "fa" => "موزامبیک",
                "ps" => "موزامبیک",
                "nationality" => [
                    "en" => "Mozambican",
                    "fa" => "موزامبیکی",
                    "ps" => "موزامبیکي",

                ],
                "provinces" => []

            ],

            "Zambia" => [
                "fa" => "زامبیا",
                "ps" => "زامبیا",
                "nationality" => [
                    "en" => "Zambian",
                    "fa" => "زامبیايي",
                    "ps" => "زامبیايي",

                ],
                "provinces" => []

            ],

            "Zimbabwe" => [
                "fa" => "زیمبابوې",
                "ps" => "زیمبابوې",
                "nationality" => [
                    "en" => "Zimbabwean",
                    "fa" => "زیمبابوې",
                    "ps" => "زیمبابوې",

                ],
                "provinces" => []

            ],

            "Malawi" => [
                "fa" => "مالاوی",
                "ps" => "مالاوي",
                "nationality" => [
                    "en" => "Malawian",
                    "fa" => "مالاويی",
                    "ps" => "مالاویایی",

                ],
                "provinces" => []

            ],

            "Tanzania" => [
                "fa" => "تانزانیا",
                "ps" => "تنزانیا",
                "nationality" => [
                    "en" => "Tanzanian",
                    "fa" => "تانزانیایی",
                    "ps" => "تنزانيایي",

                ],
                "provinces" => []

            ],

            "Uganda" => [
                "fa" => "اوگاندا",
                "ps" => "اوګانډا",
                "nationality" => [
                    "en" => "Ugandan",
                    "fa" => "اوگاندایی",
                    "ps" => "اوګنډايي",

                ],
                "provinces" => []

            ],

            "Rwanda" => [
                "fa" => "رواندا",
                "ps" => "روانډا",
                "nationality" => [
                    "en" => "Rwandan",
                    "fa" => "رواندايي",
                    "ps" => "روانډایي",

                ],
                "provinces" => []

            ],

            "Burundi" => [
                "fa" => "بوروندی",
                "ps" => "بورونډي",
                "nationality" => [
                    "en" => "Burundi",
                    "fa" => "بوروندی",
                    "ps" => "بورونډي",

                ],
                "provinces" => []

            ],

            "Ethiopia" => [
                "fa" => "اتیوپی",
                "ps" => "اتیوپیا",
                "nationality" => [
                    "en" => "Ethiopian",
                    "fa" => "اتیوپیایی",
                    "ps" => "اتیوپیایي",

                ],
                "provinces" => []

            ],

            "Somalia" => [
                "fa" => "سومالی",
                "ps" => "سومالیا",
                "nationality" => [
                    "en" => "Somali",
                    "fa" => "سومالی",
                    "ps" => "سومالیايي",

                ],
                "provinces" => []

            ],

            "Chad" => [
                "fa" => "چاد",
                "ps" => "چاډ",
                "nationality" => [
                    "en" => "Chadian",
                    "fa" => "چادی",
                    "ps" => "چادي",

                ],
                "provinces" => []

            ],

            "Central African Republic" => [
                "fa" => "جمهوری آفریقای مرکزی",
                "ps" => "د افریقې مرکزي جمهوریت",
                "nationality" => [
                    "en" => "Central African",
                    "fa" => "جمهوری آفریقای مرکزی",
                    "ps" => "مرکزي افريقايي",

                ],
                "provinces" => []

            ],

            "Congo" => [
                "fa" => "کانګو",
                "ps" => "کنگو",
                "nationality" => [
                    "en" => "Congolese",
                    "fa" => "کنگویی",
                    "ps" => "کونګولایی",

                ],
                "provinces" => []

            ],

            "Democratic Republic of the Congo" => [
                "fa" => "جمهوری دموکراتیک کنگو",
                "ps" => "د کانګو ډیموکراتیک جمهوریت",
                "nationality" => [
                    "en" => "Congolese",
                    "fa" => "کونګولایی",
                    "ps" => "کونګولایی",

                ],
                "provinces" => []

            ],

            "Gabon" => [
                "fa" => "گابن",
                "ps" => "ګابون",
                "nationality" => [
                    "en" => "Gabonese",
                    "fa" => "گابنی",
                    "ps" => "گابوني",

                ],
                "provinces" => []

            ],

            "Seychelles" => [
                "fa" => "سیچل",
                "ps" => "سیچل",
                "nationality" => [
                    "en" => "Seychellois",
                    "fa" => "سیچلسی",
                    "ps" => "سیچلسی",

                ],
                "provinces" => []

            ],

            "Mauritius" => [
                "fa" => "موریس",
                "ps" => "موریس",
                "nationality" => [
                    "en" => "Mauritian",
                    "fa" => "موریسی",
                    "ps" => "موریسی",

                ],
                "provinces" => []

            ],

            "Madagascar" => [
                "fa" => "ماداگاسکار",
                "ps" => "ماداګاسکار",
                "nationality" => [
                    "en" => "Malagasy",
                    "fa" => "ماداگاسکاري",
                    "ps" => "ماداگاسکاري",

                ],
                "provinces" => []

            ],

            "Comoros" => [
                "fa" => "کوموروس",
                "ps" => "کوموروس",
                "nationality" => [
                    "en" => "Comorian",
                    "fa" => "کوموروسی",
                    "ps" => "کوموروسی",

                ],
                "provinces" => []

            ],

            "Somaliland" => [
                "fa" => "سرزمین سومالی",
                "ps" => "سومالیلینډ",
                "nationality" => [
                    "en" => "Somalilander",
                    "fa" => "سومالیا لندی",
                    "ps" => "سومالیلنډی",

                ],
                "provinces" => []

            ],

            "Sri Lanka" => [
                "fa" => "سری‌لانکا",
                "ps" => "سریلانکا",
                "nationality" => [
                    "en" => "Sri Lankan",
                    "fa" => "سریلانکایی",
                    "ps" => "سریلانکایی",

                ],
                "provinces" => []

            ],

            "Nepal" => [
                "fa" => "نپال",
                "ps" => "نیپال",
                "nationality" => [
                    "en" => "Nepali",
                    "fa" => "نپالی",
                    "ps" => "نیپالي",

                ],
                "provinces" => []

            ],

            "Bhutan" => [
                "fa" => "بوتان",
                "ps" => "بوتان",
                "nationality" => [
                    "en" => "Bhutanese",
                    "fa" => "بوتانی",
                    "ps" => "بوتاني",

                ],
                "provinces" => []

            ],

            "Maldives" => [
                "fa" => "مالدیو",
                "ps" => "مالدیو",
                "nationality" => [
                    "en" => "Maldivian",
                    "fa" => "مالدیوئی",
                    "ps" => "مالدیوي",

                ],
                "provinces" => []

            ],

            "Bangladesh" => [
                "fa" => "بنگلادش",
                "ps" => "بنګله‌دېش",
                "nationality" => [
                    "en" => "Bangladeshi",
                    "fa" => "بنگلادشی",
                    "ps" => "بنګله‌دېشي",

                ],
                "provinces" => []

            ],

            "India" => [
                "fa" => "هندوستان",
                "ps" => "افغانستان",
                "nationality" => [
                    "en" => "Indian",
                    "fa" => "هندی",
                    "ps" => "هندی",

                ],
                "provinces" => []

            ],

            "Belarus" => [
                "fa" => "بلاروس",
                "ps" => "بیلاروس",
                "nationality" => [
                    "en" => "Belarusian",
                    "fa" => "بلاروسی",
                    "ps" => "بلاروسی",

                ],
                "provinces" => []

            ],

            "Lithuania" => [
                "fa" => "لتونی",
                "ps" => "لتوانیا",
                "nationality" => [
                    "en" => "Lithuanian",
                    "fa" => "لیتوانیایی",
                    "ps" => "لیتوانیایي",

                ],
                "provinces" => []

            ],

            "Latvia" => [
                "fa" => "لتونی",
                "ps" => "لاتویا",
                "nationality" => [
                    "en" => "Latvian",
                    "fa" => "لتوانيایي",
                    "ps" => "لتوانيایي",

                ],
                "provinces" => []

            ],

            "Estonia" => [
                "fa" => "استونی",
                "ps" => "استونیا",
                "nationality" => [
                    "en" => "Estonian",
                    "fa" => "استونیایی",
                    "ps" => "استونیايي",

                ],
                "provinces" => []

            ],

            "Moldova" => [
                "fa" => "مولداوی",
                "ps" => "مولداوا",
                "nationality" => [
                    "en" => "Moldovan",
                    "fa" => "مولداوی",
                    "ps" => "مولداوي",

                ],
                "provinces" => []

            ],

            "Armenia" => [
                "fa" => "ارمنستان",
                "ps" => "ارمنستان",
                "nationality" => [
                    "en" => "Armenian",
                    "fa" => "ارمنی",
                    "ps" => "ارمني",

                ],
                "provinces" => []

            ],

            "Georgia" => [
                "fa" => "گرجستان",
                "ps" => "ګرجستان",
                "nationality" => [
                    "en" => "Georgian",
                    "fa" => "گرجی",
                    "ps" => "گرجي",

                ],
                "provinces" => []

            ],

            "Azerbaijan" => [
                "fa" => "آذربایجان",
                "ps" => "آذربایجان",
                "nationality" => [
                    "en" => "Azerbaijani",
                    "fa" => "آذربایجانی",
                    "ps" => "آذربایجاني",

                ],
                "provinces" => []

            ],

            "Kazakhstan" => [
                "fa" => "قزاقستان",
                "ps" => "قزاقستان",
                "nationality" => [
                    "en" => "Kazakh",
                    "fa" => "قزاق",
                    "ps" => "قزاق",

                ],
                "provinces" => []

            ],

            "Kyrgyzstan" => [
                "fa" => "قرقیزستان",
                "ps" => "قرقیزستان",
                "nationality" => [
                    "en" => "Kyrgyz",
                    "fa" => "قرغیزي",
                    "ps" => "قرغیزي",

                ],
                "provinces" => []

            ],

            "Uzbekistan" => [
                "fa" => "ازبکستان",
                "ps" => "ازبکستان",
                "nationality" => [
                    "en" => "Uzbek",
                    "fa" => "ازبکي",
                    "ps" => "ازبکی",

                ],
                "provinces" => []

            ],

            "Turkmenistan" => [
                "fa" => "ترکمنستان",
                "ps" => "ترکمنستان",
                "nationality" => [
                    "en" => "Turkmen",
                    "fa" => "پاکستانی",
                    "ps" => "پاکستاني",

                ],
                "provinces" => []

            ],

            "Tajikistan" => [
                "fa" => "تاجیکستان",
                "ps" => "تاجیکستان",
                "nationality" => [
                    "en" => "Tajik",
                    "fa" => "تاجيکي",
                    "ps" => "تاجیکی",

                ],
                "provinces" => []

            ],

            "Bulgaria" => [
                "fa" => "بلغارستان",
                "ps" => "بلغاریا",
                "nationality" => [
                    "en" => "Bulgarian",
                    "fa" => "بلغاری",
                    "ps" => "بلغارۍ",

                ],
                "provinces" => []

            ],

            "Romania" => [
                "fa" => "رومانی",
                "ps" => "رومانیا",
                "nationality" => [
                    "en" => "Romanian",
                    "fa" => "پاکستانی",
                    "ps" => "رومانیایی",

                ],
                "provinces" => []

            ],

            "Croatia" => [
                "fa" => "کرواټیا",
                "ps" => "کرواټیا",
                "nationality" => [
                    "en" => "Croatian",
                    "fa" => "کرواتی",
                    "ps" => "کروات",

                ],
                "provinces" => []

            ],

            "Slovenia" => [
                "fa" => "سلووینیا",
                "ps" => "سلووینیا",
                "nationality" => [
                    "en" => "Slovene",
                    "fa" => "اسلوونیایی",
                    "ps" => "اسلوویني",

                ],
                "provinces" => []

            ],

            "Serbia" => [
                "fa" => "صربستان",
                "ps" => "سربیا",
                "nationality" => [
                    "en" => "Serbian",
                    "fa" => "صربستانی",
                    "ps" => "صربستاني",

                ],
                "provinces" => []

            ],

            "Bosnia and Herzegovina" => [
                "fa" => "بوسنی و هرزگوین",
                "ps" => "بوسنیا او هرزګووینا",
                "nationality" => [
                    "en" => "Bosnian",
                    "fa" => "بوسنیایی",
                    "ps" => "بوسنیايي",

                ],
                "provinces" => []

            ],

            "Montenegro" => [
                "fa" => "مونته‌نگرو",
                "ps" => "مونټینیګرو",
                "nationality" => [
                    "en" => "Montenegrin",
                    "fa" => "مونته‌نگرویی",
                    "ps" => "مونته‌نگروېی",

                ],
                "provinces" => []

            ],

            "North Macedonia" => [
                "fa" => "مقدونیه شمالی",
                "ps" => "شمالي مقدونیه",
                "nationality" => [
                    "en" => "Montenegrin",
                    "fa" => "مقدونیایی",
                    "ps" => "مقدونيایي",

                ],
                "provinces" => []

            ],

            "Albania" => [
                "fa" => "آلبانی",
                "ps" => "البانیا",
                "nationality" => [
                    "en" => "Albanian",
                    "fa" => "آلبانیایی",
                    "ps" => "آلبانیايي",

                ],
                "provinces" => []

            ],

            "Kosovo" => [
                "fa" => "کوزوو",
                "ps" => "کوسوو",
                "nationality" => [
                    "en" => "Kosovar",
                    "fa" => "کوزوو",
                    "ps" => "کوزوو",

                ],
                "provinces" => []

            ],

            "Malta" => [
                "fa" => "مالټا",
                "ps" => "مالټا",
                "nationality" => [
                    "en" => "Maltese",
                    "fa" => "مالتی",
                    "ps" => "مالټی",

                ],
                "provinces" => []

            ],

            "Cyprus" => [
                "fa" => "قبرس",
                "ps" => "قبرس",
                "nationality" => [
                    "en" => "Cypriot",
                    "fa" => "قبرسی",
                    "ps" => "قبرسي",

                ],
                "provinces" => []

            ],

            "Turkey" => [
                "fa" => "ترکی",
                "ps" => "ترکی",
                "nationality" => [
                    "en" => "Turkish",
                    "fa" => "ترکی",
                    "ps" => "ترکی",

                ],
                "provinces" => []

            ],

            "Israel" => [
                "fa" => "اسرائیل",
                "ps" => "اسرائیل",
                "nationality" => [
                    "en" => "Israeli",
                    "fa" => "اسرائیلی",
                    "ps" => "اسرائیلي",

                ],
                "provinces" => []

            ],

            "Palestine" => [
                "fa" => "فلسطین",
                "ps" => "فلسطین",
                "nationality" => [
                    "en" => "Palestinian",
                    "fa" => "فلسطینی",
                    "ps" => "فلسطینی",

                ],
                "provinces" => []

            ],

            "Barbados" => [
                "fa" => "باربادوس",
                "ps" => "باربادوس",
                "nationality" => [
                    "en" => "Barbadian",
                    "fa" => "باربادوسی",
                    "ps" => "باربادوسي",

                ],
                "provinces" => []

            ],

            "Saint Lucia" => [
                "fa" => "سینټ لوسیا",
                "ps" => "سینټ لوسیا",
                "nationality" => [
                    "en" => "Saint Lucian",
                    "fa" => "سنت لوسیایی",
                    "ps" => "سانت لوسیایي",

                ],
                "provinces" => []

            ],

            "Saint Vincent and the Grenadines" => [
                "fa" => "سینټ وینسنت او ګریناډینز",
                "ps" => "سینټ وینسنت او ګریناډینز",
                "nationality" => [
                    "en" => "St. Vincentian",
                    "fa" => "سنت وینسنتی",
                    "ps" => "سینت وینسینټی",

                ],
                "provinces" => []

            ],

            "Antigua and Barbuda" => [
                "fa" => "آنتیگوا و باربودا",
                "ps" => "آنتیګوا او باربودا",
                "nationality" => [
                    "en" => "Antiguan and Barbudan",
                    "fa" => "آنتیگویی و باربودایی",
                    "ps" => "آنتیګوایي او باربودایي",

                ],
                "provinces" => []

            ],

            "Dominica" => [
                "fa" => "دومینیکا",
                "ps" => "دومینیکا",
                "nationality" => [
                    "en" => "Dominican",
                    "fa" => "دومینیکایی",
                    "ps" => "ډومینیکايي",

                ],
                "provinces" => []

            ],

            "Grenada" => [
                "fa" => "گرانادا",
                "ps" => "ګریناډا",
                "nationality" => [
                    "en" => "Grenadian",
                    "fa" => "گرنادایی",
                    "ps" => "ګرينډايي",

                ],
                "provinces" => []

            ],

            "Saint Kitts and Nevis" => [
                "fa" => "سنت کیتس و نویس",
                "ps" => "سینټ کیټس او نیویس",
                "nationality" => [
                    "en" => "St. Kitts and Nevisian",
                    "fa" => "سنت کیتس و نویسی",
                    "ps" => "سینټ کیټس او نویسی",

                ],
                "provinces" => []

            ],

            "Jamaica" => [
                "fa" => "جامائیکا",
                "ps" => "جامائیکا",
                "nationality" => [
                    "en" => "Jamaican",
                    "fa" => "جامائیکایی",
                    "ps" => "جامايکايي",

                ],
                "provinces" => []

            ],

            "Haiti" => [
                "fa" => "هائیتی",
                "ps" => "هایټي",
                "nationality" => [
                    "en" => "Haitian",
                    "fa" => "هائیتی",
                    "ps" => "هایټي",

                ],
                "provinces" => []

            ],

            "Cuba" => [
                "fa" => "کوبا",
                "ps" => "کیوبا",
                "nationality" => [
                    "en" => "Cuban",
                    "fa" => "کوبایی",
                    "ps" => "کوبایي",

                ],
                "provinces" => []

            ],

            "Dominican Republic" => [
                "fa" => "جمهوری دومینیکن",
                "ps" => "دومینیکن جمهوریت",
                "nationality" => [
                    "en" => "Dominican",
                    "fa" => "دومینیکایی",
                    "ps" => "دومینیکايي",

                ],
                "provinces" => []

            ],

            "Puerto Rico" => [
                "fa" => "پورتوریکو",
                "ps" => "پورتوریکو",
                "nationality" => [
                    "en" => "Puerto Rican",
                    "fa" => "پورتوریکویی",
                    "ps" => "پورتوریکويی",

                ],
                "provinces" => []

            ],

            "Costa Rica" => [
                "fa" => "کاستاریکا",
                "ps" => "کاستاریکا",
                "nationality" => [
                    "en" => "Costa Rican",
                    "fa" => "کاستاریکایی",
                    "ps" => "کاستاریکایي",

                ],
                "provinces" => []

            ],

            "Panama" => [
                "fa" => "پاناما",
                "ps" => "پاناما",
                "nationality" => [
                    "en" => "Panamanian",
                    "fa" => "پانامایی",
                    "ps" => "پاناماايي",

                ],
                "provinces" => []

            ],

            "Nicaragua" => [
                "fa" => "نیکاراگوئه",
                "ps" => "نیکاراګوا",
                "nationality" => [
                    "en" => "Nicaraguan",
                    "fa" => "نیکاراگویی",
                    "ps" => "نیکاراګوایي",

                ],
                "provinces" => []

            ],

            "El Salvador" => [
                "fa" => "السالوادور",
                "ps" => "السالوادور",
                "nationality" => [
                    "en" => "Salvadoran",
                    "fa" => "ال‌ساوادوري",
                    "ps" => "ال‌ساوادوری",

                ],
                "provinces" => []

            ],

            "Honduras" => [
                "fa" => "هندوراس",
                "ps" => "هندوراس",
                "nationality" => [
                    "en" => "Honduran",
                    "fa" => "هندوراسی",
                    "ps" => "هندوراسي",

                ],
                "provinces" => []

            ],

            "Guatemala" => [
                "fa" => "گواتمالا",
                "ps" => "ګواتیمالا",
                "nationality" => [
                    "en" => "Guatemalan",
                    "fa" => "گواتمالایی",
                    "ps" => "ګواتمالایي",

                ],
                "provinces" => []

            ],

            "Belize" => [
                "fa" => "بلیز",
                "ps" => "بلیز",
                "nationality" => [
                    "en" => "Belizan",
                    "fa" => "بلیزی",
                    "ps" => "بلیزي",

                ],
                "provinces" => []

            ],

            "Colombia" => [
                "fa" => "کلمبیا",
                "ps" => "کولمبیا",
                "nationality" => [
                    "en" => "Colombian",
                    "fa" => "کلمبیایی",
                    "ps" => "کلمبیايي",

                ],
                "provinces" => []

            ],

            "Venezuela" => [
                "fa" => "ونزوئلا",
                "ps" => "وینزویلا",
                "nationality" => [
                    "en" => "Venezuelan",
                    "fa" => "ونزوئلایی",
                    "ps" => "ونزویلايي",

                ],
                "provinces" => []

            ],

            "Guyana" => [
                "fa" => "گویان",
                "ps" => "ګویانا",
                "nationality" => [
                    "en" => "Guyanese",
                    "fa" => "گویانیایی",
                    "ps" => "ګویانيایي",

                ],
                "provinces" => []

            ],

            "Suriname" => [
                "fa" => "سورینام",
                "ps" => "سورینام",
                "nationality" => [
                    "en" => "Surinamese",
                    "fa" => "سورینامی",
                    "ps" => "سورینامي",

                ],
                "provinces" => []

            ],

            "French Guiana" => [
                "fa" => "گویان فرانسه",
                "ps" => "ګویانا فرانسوي",
                "nationality" => [
                    "en" => "French Guianese",
                    "fa" => "گویانای فرانسوی",
                    "ps" => "ګویانا فرانسوي",

                ],
                "provinces" => []

            ],

            "Luxembourg" => [
                "fa" => "لوکزامبورگ",
                "ps" => "لوکزامبورګ",
                "nationality" => [
                    "en" => "Luxembourgish",
                    "fa" => "لوکزامبورگی",
                    "ps" => "لوکزامبورګي",

                ],
                "provinces" => []

            ],

            "Iceland" => [
                "fa" => "ایسلند",
                "ps" => "ایسلهڼډ",
                "nationality" => [
                    "en" => "Icelandic",
                    "fa" => "ایسلندی",
                    "ps" => "ایسلينډي",

                ],
                "provinces" => []

            ],

            "Ireland" => [
                "fa" => "ایرلند",
                "ps" => "آیرلنډ",
                "nationality" => [
                    "en" => "Irish",
                    "fa" => "ایرلندی",
                    "ps" => "ایرلندۍ",

                ],
                "provinces" => []

            ],

            "Andorra" => [
                "fa" => "انډورا",
                "ps" => "آندورا",
                "nationality" => [
                    "en" => "Andorran",
                    "fa" => "آندورایی",
                    "ps" => "انډورایي",

                ],
                "provinces" => []

            ],

            "Monaco" => [
                "fa" => "موناکو",
                "ps" => "موناکو",
                "nationality" => [
                    "en" => "Monégasque",
                    "fa" => "موناکویی",
                    "ps" => "موناکوي",

                ],
                "provinces" => []

            ],

            "San Marino" => [
                "fa" => "سان مارینو",
                "ps" => "سان مارینو",
                "nationality" => [
                    "en" => "Sanmarinese",
                    "fa" => "سان‌مارینویی",
                    "ps" => "سان‌مارينوي",

                ],
                "provinces" => []

            ],

            "Vatican City" => [
                "fa" => "واتیکان",
                "ps" => "د واتیکان ښار",
                "nationality" => [
                    "en" => "Vatican",
                    "fa" => "واتیکانی",
                    "ps" => "واتیکاني",

                ],
                "provinces" => []

            ],

            "Liechtenstein" => [
                "fa" => "لیختن‌اشتاین",
                "ps" => "لیختن‌اشتاین",
                "nationality" => [
                    "en" => "Liechtensteiner",
                    "fa" => "لیختن‌اشتایني",
                    "ps" => "لیختن‌اشتایني",

                ],
                "provinces" => []

            ],

            "Czech Republic" => [
                "fa" => "جمهوری چک",
                "ps" => "چک جمهوریت",
                "nationality" => [
                    "en" => "Czech",
                    "fa" => "چکی",
                    "ps" => "چکی",
                ],
                "provinces" => []

            ],


            "Slovakia" => [
                "fa" => "اسلواکی",
                "ps" => "سلوواکیا",
                "nationality" => [
                    "en" => "Slovak",
                    "fa" => "اسلواکی",
                    "ps" => "اسلواکي",

                ],
                "provinces" => []

            ],

            "Hungary" => [
                "fa" => "هنګري",
                "ps" => "هنګري",
                "nationality" => [
                    "en" => "Hungarian",
                    "fa" => "مجارستاني",
                    "ps" => "مجارستاني",

                ],
                "provinces" => []

            ],

            "Trinidad and Tobago" => [
                "fa" => "ترینیداد و توباگو",
                "ps" => "ترینیداد او توباګو",
                "nationality" => [
                    "en" => "Trinidadian and Tobagonian",
                    "fa" => "ترینیدادی و توباگویی",
                    "ps" => "ترینیدادي او توباګوي",

                ],
                "provinces" => []

            ],

            "The Bahamas" => [
                "fa" => "باهاماس",
                "ps" => "باهاماس",
                "nationality" => [
                    "en" => "Bahamian",
                    "fa" => "باهامی",
                    "ps" => "باهامي",

                ],
                "provinces" => []

            ],

            "South Sudan" => [
                "fa" => "سودان جنوبی",
                "ps" => "جنوبي سوډان",
                "nationality" => [
                    "en" => "South Sudanese",
                    "fa" => "جنوب سودانی",
                    "ps" => "جنوبي سوډاني",

                ],
                "provinces" => []

            ],

            "Eritrea" => [
                "fa" => "اریتره",
                "ps" => "اریتریا",
                "nationality" => [
                    "en" => "Eritrean",
                    "fa" => "اریتریایی",
                    "ps" => "پاکستاني",

                ],
                "provinces" => []

            ],

            "Djibouti" => [
                "fa" => "جیبوتی",
                "ps" => "جیبوتي",
                "nationality" => [
                    "en" => "Djiboutian",
                    "fa" => "جیبوتی",
                    "ps" => "جیبوتي",

                ],
                "provinces" => []

            ],

            "Mali" => [
                "fa" => "مالی",
                "ps" => "مالي",
                "nationality" => [
                    "en" => "Malian",
                    "fa" => "مالي",
                    "ps" => "مالي",

                ],
                "provinces" => []

            ],

            "Niger" => [
                "fa" => "نیجر",
                "ps" => "نیجر",
                "nationality" => [
                    "en" => "Nigerien",
                    "fa" => "نیجری",
                    "ps" => "نیجري",

                ],
                "provinces" => []

            ],

            "Burkina Faso" => [
                "fa" => "بورکینا فاسو",
                "ps" => "بورکینا فاسو",
                "nationality" => [
                    "en" => "Burkinabé",
                    "fa" => "بورکینی",
                    "ps" => "بورکيني",

                ],
                "provinces" => []

            ],

            "Senegal" => [
                "fa" => "سنگال",
                "ps" => "سینیګال",
                "nationality" => [
                    "en" => "Senegalese",
                    "fa" => "سنگالی",
                    "ps" => "سنگالي",

                ],
                "provinces" => []

            ],

            "The Gambia" => [
                "fa" => "گامبیا",
                "ps" => "ګامبیا",
                "nationality" => [
                    "en" => "Gambian",
                    "fa" => "گامبیایی",
                    "ps" => "ګامبيایي",

                ],
                "provinces" => []

            ],

            "Guinea" => [
                "fa" => "ګینه",
                "ps" => "گینه",
                "nationality" => [
                    "en" => "Guinean",
                    "fa" => "گینه‌ای",
                    "ps" => "ګینه‌اي",

                ],
                "provinces" => []

            ],

            "Guinea-Bissau" => [
                "fa" => "گینه بیسائو",
                "ps" => "ګینه بیساؤ",
                "nationality" => [
                    "en" => "Guinea-Bissauan",
                    "fa" => "گینه‌بیساوویی",
                    "ps" => "ګینه‌بیساوۍ",

                ],
                "provinces" => []

            ],

            "Cape Verde" => [
                "fa" => "کیپ ورد",
                "ps" => "کیپ ورد",
                "nationality" => [
                    "en" => "Cape Verdean",
                    "fa" => "کیپ وردی",
                    "ps" => "کیپ وردي",

                ],
                "provinces" => []

            ],


            "Sao Tome and Principe" => [
                "fa" => "سائو تومه و پرینسیپ",
                "ps" => "سائو تومه و پرینسیپ",
                "nationality" => [
                    "en" => "São Toméan",
                    "fa" => "سائوتومه‌ای و پرینسیپی",
                    "ps" => "سائوتومه او پرنسيپي",

                ],
                "provinces" => []

            ],

            "Equatorial Guinea" => [
                "fa" => "گینه استوایی",
                "ps" => "استوایي ګینه",
                "nationality" => [
                    "en" => "Equatorial Guinean",
                    "fa" => "گینه استوایی",
                    "ps" => "ګینه‌استوایي",

                ],
                "provinces" => []

            ],

            "Libya" => [
                "fa" => "لیبیا",
                "ps" => "لیبیا",
                "nationality" => [
                    "en" => "Libyan",
                    "fa" => "لیبیایی",
                    "ps" => "لیبیایي",

                ],
                "provinces" => []

            ],

            "Ghana" => [
                "fa" => "غنا",
                "ps" => "غنا",
                "nationality" => [
                    "en" => "Ghanaian",
                    "fa" => "غنایی",
                    "ps" => "غنايي",

                ],
                "provinces" => []

            ],

            "Togo" => [
                "fa" => "توگو",
                "ps" => "ټوګو",
                "nationality" => [
                    "en" => "Togian",
                    "fa" => "توگویی ",
                    "ps" => "توګوي",

                ],
                "provinces" => []

            ],

            "Benin" => [
                "fa" => "بنین",
                "ps" => "بنین",
                "nationality" => [
                    "en" => "Beninese",
                    "fa" => "بنینی",
                    "ps" => "بنيني",

                ],
                "provinces" => []

            ],

            "Cote d'Ivoire" => [
                "fa" => "ساحل عاج",
                "ps" => "عاج ساحل",
                "nationality" => [
                    "en" => "Ivorian",
                    "fa" => "ساحل عاجی",
                    "ps" => "ساحل عاجي",

                ],
                "provinces" => []

            ],

            "Cameroon" => [
                "fa" => "کامرون",
                "ps" => "کامرون",
                "nationality" => [
                    "en" => "Cameroonian",
                    "fa" => "مالي",
                    "ps" => "مالي",

                ],
                "provinces" => []

            ],

            "MaLesotholi" => [
                "fa" => "لسوتو",
                "ps" => "لیسوتو",
                "nationality" => [
                    "en" => "Lesothan",
                    "fa" => "لسوتویی",
                    "ps" => "لسوتوي",

                ],
                "provinces" => []

            ],

            "Eswatini" => [
                "fa" => "اسواتینی",
                "ps" => "ایسواتیني",
                "nationality" => [
                    "en" => "Swazi",
                    "fa" => "اسواتینی",
                    "ps" => "اسواتيني",

                ],
                "provinces" => []

            ],

            "Botswana" => [
                "fa" => "بوتسوانا",
                "ps" => "بوټسوانا",
                "nationality" => [
                    "en" => "Botswanan",
                    "fa" => "بوتسوانایی",
                    "ps" => "بوتسوانایي",

                ],
                "provinces" => []

            ],

            "Namibia" => [
                "fa" => "نامیبیا",
                "ps" => "نامیبیا",
                "nationality" => [
                    "en" => "Namibian",
                    "fa" => "نامیبیاایی",
                    "ps" => "نامیبیايي",

                ],
                "provinces" => []

            ],

            "New Zealand" => [
                "fa" => "نیوزیلند",
                "ps" => "نیوزیلېنډ",
                "nationality" => [
                    "en" => "New Zealander",
                    "fa" => "نیوزیلندی",
                    "ps" => "نیوزیلنډي",

                ],
                "provinces" => []

            ],

            "Fiji" => [
                "fa" => "فیجی",
                "ps" => "فیجي",
                "nationality" => [
                    "en" => "Fijian",
                    "fa" => "فیجیایی",
                    "ps" => "فیجيایي",

                ],
                "provinces" => []

            ],

            "Papua New Guinea" => [
                "fa" => "پاپوا گینه نو",
                "ps" => "پاپوا گینه نو",
                "nationality" => [
                    "en" => "Papua New Guinean",
                    "fa" => "پاپوآ گینه‌نوایی",
                    "ps" => "پاپوآګینه‌نوایي",

                ],
                "provinces" => []

            ],

            "Solomon Islands" => [
                "fa" => "جزایر سلیمان",
                "ps" => "سلیمان ټاپوګان",
                "nationality" => [
                    "en" => "Solomon Islander",
                    "fa" => "سلیمانی",
                    "ps" => "سلیماني",

                ],
                "provinces" => []

            ],

            "Vanuatu" => [
                "fa" => "وانواتو",
                "ps" => "وانواتو",
                "nationality" => [
                    "en" => "Vanuatuan",
                    "fa" => "وانواتویی",
                    "ps" => "وانواتوي",

                ],
                "provinces" => []

            ],

            "Samoa" => [
                "fa" => "ساموآ",
                "ps" => "ساموآ",
                "nationality" => [
                    "en" => "Samoan",
                    "fa" => "ساموایی",
                    "ps" => "ساموايي",

                ],
                "provinces" => []

            ],

            "Tonga" => [
                "fa" => "تونگا",
                "ps" => "ټونګا",
                "nationality" => [
                    "en" => "Tongan",
                    "fa" => "تونگایی",
                    "ps" => "تونګي",

                ],
                "provinces" => []

            ],

            "Kiribati" => [
                "fa" => "کیریباتی",
                "ps" => "کیریباتي",
                "nationality" => [
                    "en" => "Kiribatian",
                    "fa" => "کیریباتی",
                    "ps" => "کیریباتي",

                ],
                "provinces" => []

            ],

            "Marshall Islands" => [
                "fa" => "جزایر مارشال",
                "ps" => "مارشال ټاپوګان",
                "nationality" => [
                    "en" => "Marshallese",
                    "fa" => "جزایر مارشال",
                    "ps" => "مارشالي",

                ],
                "provinces" => []

            ],

            "Federated States of Micronesia" => [
                "fa" => "ایالات فدرال میکرونزیا",
                "ps" => "د مایکرو نیژیا متحده ایالات",
                "nationality" => [
                    "en" => "Micronesian",
                    "fa" => "میکرونزیایی",
                    "ps" => "میکرونزیايي",

                ],
                "provinces" => []

            ],

            "Palau" => [
                "fa" => "پالائو",
                "ps" => "پالاو",
                "nationality" => [
                    "en" => "Palauan",
                    "fa" => "پالائویی",
                    "ps" => "پالاويي",

                ],
                "provinces" => []

            ],

            "Nauru" => [
                "fa" => "نائورو",
                "ps" => "نائورو",
                "nationality" => [
                    "en" => "Nauruan",
                    "fa" => "ناورو",
                    "ps" => "نائورویی",

                ],
                "provinces" => []

            ],

            "Tuvalu" => [
                "fa" => "تووالو",
                "ps" => "تووالو",
                "nationality" => [
                    "en" => "Tuvaluan",
                    "fa" => "تووالو",
                    "ps" => "تووالوۍ",

                ],
                "provinces" => []

            ],

            "Timor-Leste" => [
                "fa" => "تیمور-لیست",
                "ps" => "تیمور-لیست",
                "nationality" => [
                    "en" => "Timorese",
                    "fa" => "تیموری",
                    "ps" => "تیموري",

                ],

            ],
        ];

        foreach ($country as $name => $translations) {
            $abbr = $countryInfo[$name]['abbr'] ?? null;
            $code = $countryInfo[$name]['code'] ?? null;
            $flag = $abbr ? $toFlag($abbr) : null;

            $cnt = Country::factory()->create([
                'code' => $code,
                'abbr' => $abbr,
                'flag' => $flag
            ]);

            CountryTrans::create([
                'value' => $name,
                "language_name" => "en",
                "country_id" => $cnt->id
            ]);

            foreach ($translations as $key => $value) {
                if ($key == 'provinces') {
                    foreach ($value as $provinceName => $provinceDetails) {
                        $province = Province::factory()->create([
                            "country_id" => $cnt->id
                        ]);
                        ProvinceTrans::create([
                            'value' => $provinceName,
                            "language_name" => "en",
                            "province_id" => $province->id
                        ]);
                        foreach ($provinceDetails as $provinceKey => $provinceValue) {
                            if ($provinceKey == 'District') {
                                foreach ($provinceValue as $districtName => $districtDetails) {
                                    $district = District::factory()->create([
                                        "province_id" => $province->id
                                    ]);
                                    DistrictTrans::create([
                                        'value' => $districtName,
                                        "language_name" => "en",
                                        "district_id" => $district->id
                                    ]);
                                    foreach ($districtDetails as $language => $translation) {
                                        DistrictTrans::create([
                                            'value' => $translation,
                                            "language_name" => $language,
                                            "district_id" => $district->id
                                        ]);
                                    }
                                }
                            } else {
                                ProvinceTrans::create([
                                    'value' => $provinceValue,
                                    "language_name" => $provinceKey,
                                    "province_id" => $province->id
                                ]);
                            }
                        }
                    }
                } elseif ($key == 'nationality') {
                    $nationality = Nationality::create([
                        'country_id' => $cnt->id
                    ]);
                    foreach ($value as $lang => $natValue) {
                        NationalityTrans::create([
                            'value' => $natValue,
                            "language_name" => $lang,
                            "nationality_id" => $nationality->id
                        ]);
                    }
                } else {
                    CountryTrans::create([
                        'value' => $value,
                        "language_name" => $key,
                        "country_id" => $cnt->id
                    ]);
                }
            }
        }
    }

    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {


    //     foreach ($country as $name => $translations) {
    //         // Create the country record
    //         $cnt = Country::factory()->create([]);
    //         CountryTrans::create([
    //             'value' => $name,
    //             "language_name" => "en",
    //             "country_id" => $cnt->id
    //         ]);

    //         // Loop through translations (e.g., fa, ps)
    //         foreach ($translations as $key => $value) {
    //             // Check if this is the province section
    //             if ($key == 'provinces') {
    //                 foreach ($value as $provinceName => $provinceDetails) {
    //                     // Create a province for this country
    //                     $province = Province::factory()->create([
    //                         "country_id" => $cnt->id,  // Associate province with the created country
    //                     ]);
    //                     ProvinceTrans::create([
    //                         'value' => $provinceName,
    //                         "language_name" => "en",
    //                         "province_id" => $province->id
    //                     ]);

    //                     // Loop through the province's translations and districts
    //                     foreach ($provinceDetails as $provinceKey => $provinceValue) {
    //                         if ($provinceKey == 'District') {
    //                             foreach ($provinceValue as $districtName => $districtDetails) {
    //                                 // Create district for this province
    //                                 $district = District::factory()->create([
    //                                     "province_id" => $province->id,  // Associate district with the created province
    //                                 ]);
    //                                 DistrictTrans::create([
    //                                     'value' => $districtName,
    //                                     "language_name" => "en",
    //                                     "district_id" => $district->id
    //                                 ]);

    //                                 // Translate district details (e.g., fa, ps)
    //                                 foreach ($districtDetails as $language => $translation) {
    //                                     DistrictTrans::create([
    //                                         'value' => $translation,
    //                                         "language_name" => $language,
    //                                         "district_id" => $district->id
    //                                     ]);
    //                                 }
    //                             }
    //                         } else {
    //                             // Translate province details (e.g., fa, ps)
    //                             ProvinceTrans::create([
    //                                 'value' => $provinceValue,
    //                                 "language_name" => $provinceKey,
    //                                 "province_id" => $province->id
    //                             ]);
    //                         }
    //                     }
    //                 }
    //             } else if ($key == 'nationality') {
    //                 $nationality = Nationality::create([
    //                     'country_id' => $cnt->id
    //                 ]);
    //                 foreach ($value as $provinceName => $provinceDetails) {
    //                     NationalityTrans::create([
    //                         'value' => $provinceDetails,
    //                         "language_name" => $provinceName,
    //                         "nationality_id" => $nationality->id
    //                     ]);
    //                 }
    //             } else {
    //                 // Translate country details (e.g., fa, ps)
    //                 CountryTrans::create([
    //                     'value' => $value,
    //                     "language_name" => $key,
    //                     "country_id" => $cnt->id
    //                 ]);
    //             }
    //         }
    //     }
    // }
}
