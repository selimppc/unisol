<?php

class CurrencyTable extends Seeder{
    public function run(){

        DB::table('currency')->delete();

        $currency = array(
            "US Dollar"=>"USD",
            "Afghanistan Afghani"=>"AFN",
            "Albanian Lek"=>"ALL",
            "Algerian Dinar"=>"DZD",
            "Andorran Franc"=>"ADF",
            "Andorran Peseta"=>"ADP",
            "Angolan Kwanza"=>"AOA",
            "Angolan New Kwanza"=>"AON",
            "Argentine Peso"=>"ARS",
            "Armenian Dram"=>"AMD",
            "Aruban Florin"=>"AWG",
            "Australian Dollar"=>"AUD",
            "Austrian Schilling"=>"ATS",
            "Azerbaijan Manat"=>"AZM",
            "Azerbaijan New Manat"=>"AZN",
            "Bahamian Dollar"=>"BSD",
            "Bahraini Dinar"=>"BHD",
            "Bangladeshi Taka"=>"BDT",
            "Barbados Dollar"=>"BBD",
            "Belarusian Ruble"=>"BYR",
            "Belgian Franc"=>"BEF",
            "Belize Dollar"=>"BZD",
            "Bermudian Dollar"=>"BMD",
            "Bhutan Ngultrum"=>"BTN",
            "Bolivian Boliviano"=>"BOB",
            "Bosnian Mark"=>"BAM",
            "Botswana Pula"=>"BWP",
            "Brazilian Real"=>"BRL",
            "British Pound"=>"GBP",
            "Brunei Dollar"=>"BND",
            "Bulgarian Lev"=>"BGN",
            "Burundi Franc"=>"BIF",
            "CFA Franc BCEAO"=>"XOF",
            "CFA Franc BEAC"=>"XAF",
            "CFP Franc"=>"XPF",
            "Cambodian Riel"=>"KHR",
            "Canadian Dollar"=>"CAD",
            "Cape Verde Escudo"=>"CVE",
            "Cayman Islands Dollar"=>"KYD",
            "Chilean Peso"=>"CLP",
            "Chinese Yuan Renminbi"=>"CNY",
            "Colombian Peso"=>"COP",
            "Comoros Franc"=>"KMF",
            "Congolese Franc"=>"CDF",
            "Costa Rican Colon"=>"CRC",
            "Croatian Kuna"=>"HRK",
            "Cuban Convertible Peso"=>"CUC",
            "Cuban Peso"=>"CUP",
            "Cyprus Pound"=>"CYP",
            "Czech Koruna"=>"CZK",
            "Danish Krone"=>"DKK",
            "Djibouti Franc"=>"DJF",
            "Dominican R Peso"=>"DOP",
            "Dutch Guilder"=>"NLG",
            "ECU"=>"XEU",
            "East Caribbean Dollar"=>"XCD",
            "Ecuador Sucre"=>"ECS",
            "Egyptian Pound"=>"EGP",
            "El Salvador Colon"=>"SVC",
            "Estonian Kroon"=>"EEK",
            "Ethiopian Birr"=>"ETB",
            "Euro"=>"EUR",
            "Falkland Islands Pound"=>"FKP",
            "Fiji Dollar"=>"FJD",
            "Finnish Markka"=>"FIM",
            "French Franc"=>"FRF",
            "Gambian Dalasi"=>"GMD",
            "Georgian Lari"=>"GEL",
            "German Mark"=>"DEM",
            "Ghanaian Cedi"=>"GHC",
            "Ghanaian New Cedi"=>"GHS",
            "Gibraltar Pound"=>"GIP",
            "Gold (oz)"=>"XAU",
            "Greek Drachma"=>"GRD",
            "Guatemalan Quetzal"=>"GTQ",
            "Guinea Franc"=>"GNF",
            "Guyanese Dollar"=>"GYD",
            "Haitian Gourde"=>"HTG",
            "Honduran Lempira"=>"HNL",
            "Hong Kong Dollar"=>"HKD",
            "Hungarian Forint"=>"HUF",
            "Iceland Krona"=>"ISK",
            "Indian Rupee"=>"INR",
            "Indonesian Rupiah"=>"IDR",
            "Iranian Rial"=>"IRR",
            "Iraqi Dinar"=>"IQD",
            "Irish Punt"=>"IEP",
            "Israeli New Shekel"=>"ILS",
            "Italian Lira"=>"ITL",
            "Jamaican Dollar"=>"JMD",
            "Japanese Yen"=>"JPY",
            "Jordanian Dinar"=>"JOD",
            "Kazakhstan Tenge"=>"KZT",
            "Kenyan Shilling"=>"KES",
            "Kuwaiti Dinar"=>"KWD",
            "Kyrgyzstanian Som"=>"KGS",
            "Lao Kip"=>"LAK",
            "Latvian Lats"=>"LVL",
            "Lebanese Pound"=>"LBP",
            "Lesotho Loti"=>"LSL",
            "Liberian Dollar"=>"LRD",
            "Libyan Dinar"=>"LYD",
            "Lithuanian Litas"=>"LTL",
            "Luxembourg Franc"=>"LUF",
            "Macau Pataca"=>"MOP",
            "Macedonian Denar"=>"MKD",
            "Malagasy Ariary"=>"MGA",
            "Malagasy Franc"=>"MGF",
            "Malawi Kwacha"=>"MWK",
            "Malaysian Ringgit"=>"MYR",
            "Maldive Rufiyaa"=>"MVR",
            "Maltese Lira"=>"MTL",
            "Mauritanian Ouguiya"=>"MRO",
            "Mauritius Rupee"=>"MUR",
            "Mexican Peso"=>"MXN",
            "Moldovan Leu"=>"MDL",
            "Mongolian Tugrik"=>"MNT",
            "Moroccan Dirham"=>"MAD",
            "Mozambique Metical"=>"MZM",
            "Mozambique New Metical"=>"MZN",
            "Myanmar Kyat"=>"MMK",
            "NL Antillian Guilder"=>"ANG",
            "Namibia Dollar"=>"NAD",
            "Nepalese Rupee"=>"NPR",
            "New Zealand Dollar"=>"NZD",
            "Nicaraguan Cordoba Oro"=>"NIO",
            "Nigerian Naira"=>"NGN",
            "North Korean Won"=>"KPW",
            "Norwegian Kroner"=>"NOK",
            "Omani Rial"=>"OMR",
            "Pakistan Rupee"=>"PKR",
            "Palladium (oz)"=>"XPD",
            "Panamanian Balboa"=>"PAB",
            "Papua New Guinea Kina"=>"PGK",
            "Paraguay Guarani"=>"PYG",
            "Peruvian Nuevo Sol"=>"PEN",
            "Philippine Peso"=>"PHP",
            "Platinum (oz)"=>"XPT",
            "Polish Zloty"=>"PLN",
            "Portuguese Escudo"=>"PTE",
            "Qatari Rial"=>"QAR",
            "Romanian Lei"=>"ROL",
            "Romanian New Lei"=>"RON",
            "Russian Rouble"=>"RUB",
            "Rwandan Franc"=>"RWF",
            "Samoan Tala"=>"WST",
            "Sao Tome/Principe Dobra"=>"STD",
            "Saudi Riyal"=>"SAR",
            "Serbian Dinar"=>"RSD",
            "Seychelles Rupee"=>"SCR",
            "Sierra Leone Leone"=>"SLL",
            "Silver (oz)"=>"XAG",
            "Singapore Dollar"=>"SGD",
            "Slovak Koruna"=>"SKK",
            "Slovenian Tolar"=>"SIT",
            "Solomon Islands Dollar"=>"SBD",
            "Somali Shilling"=>"SOS",
            "South African Rand"=>"ZAR",
            "South-Korean Won"=>"KRW",
            "Spanish Peseta"=>"ESP",
            "Sri Lanka Rupee"=>"LKR",
            "St Helena Pound"=>"SHP",
            "Sudanese Dinar"=>"SDD",
            "Sudanese Old Pound"=>"SDP",
            "Sudanese Pound"=>"SDG",
            "Suriname Dollar"=>"SRD",
            "Suriname Guilder"=>"SRG",
            "Swaziland Lilangeni"=>"SZL",
            "Swedish Krona"=>"SEK",
            "Swiss Franc"=>"CHF",
            "Syrian Pound"=>"SYP",
            "Taiwan Dollar"=>"TWD",
            "Tajikistani Somoni"=>"TJS",
            "Tanzanian Shilling"=>"TZS",
            "Thai Baht"=>"THB",
            "Tonga Pa'anga"=>"TOP",
            "Trinidad/Tobago Dollar"=>"TTD",
            "Tunisian Dinar"=>"TND",
            "Turkish Lira"=>"TRY",
            "Turkish Old Lira"=>"TRL",
            "Turkmenistan Manat"=>"TMM",
            "Turkmenistan New Manat"=>"TMT",
            "Uganda Shilling"=>"UGX",
            "Ukraine Hryvnia"=>"UAH",
            "Uruguayan Peso"=>"UYU",
            "Utd Arab Emir"=>"Dirham",
            "Uzbekistan Som"=>"UZS",
            "Vanuatu Vatu"=>"VUV",
            "Venezuelan Bolivar"=>"VEB",
            "Venezuelan Bolivar Fuerte"=>"VEF",
            "Vietnamese Dong"=>"VND",
            "Yemeni Rial"=>"YER",
            "Yugoslav Dinar"=>"YUN",
            "Zambian Kwacha"=>"ZMW",
            "Zambian Kwacha"=>"ZMK",
            "Zimbabwe Dollar"=>"ZWD",
        );

        foreach($currency as $key => $value){
            Currency::insert(array(
                'title' => $key,
                'code' => $value,
                'exchange_rate' => 100,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ));
        }
    }
} 