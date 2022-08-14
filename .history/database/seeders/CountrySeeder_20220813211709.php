<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            ['Afghanistan','AF','AFG',4,'afghanistan'],
            ['Aland Islands','AX','ALA',248,'aland-islands'],
            ['Albania','AL','ALB',8,'albania'],
            ['Algeria','DZ','DZA',12,'algeria'],
            ['American Samoa','AS','ASM',16,'american-samoa'],
            ['Andorra','AD','AND',20,'andorra'],
            ['Angola','AO','AGO',24,'angola'],
            ['Anguilla','AI','AIA',660,'anguilla'],
            ['Antigua and Barbuda','AG','ATG',28,'antigua-and-barbuda'],
            ['Argentina','AR','ARG',32,'argentina'],
            ['Armenia','AM','ARM',51,'armenia'],
            ['Aruba','AW','ABW',533,'aruba'],
            ['Australia','AU','AUS',36,'australia'],
            ['Austria','AT','AUT',40,'austria'],
            ['Azerbaijan','AZ','AZE',31,'azerbaijan'],
            ['Bahamas','BS','BHS',44,'bahamas'],
            ['Bahrain','BH','BHR',48,'bahrain'],
            ['Bangladesh','BD','BGD',50,'bangladesh'],
            ['Barbados','BB','BRB',52,'barbados'],
            ['Belarus','BY','BLR',112,'belarus'],
            ['Belgium','BE','BEL',56,'belgium'],
            ['Belize','BZ','BLZ',84,'belize'],
            ['Benin','BJ','BEN',204,'benin'],
            ['Bermuda','BM','BMU',60,'bermuda'],
            ['Bhutan','BT','BTN',64,'bhutan'],
            ['Bolivia','BO','BOL',68,'bolivia'],
            ['Bosnia and Herzegovina','BA','BIH',70,'bosnia-and-herzegovina'],
            ['Botswana','BW','BWA',72,'botswana'],
            ['Brazil','BR','BRA',76,'brazil'],
            ['British Virgin Islands','VG','VGB',92,'british-virgin-islands'],
            ['Brunei Darussalam','BN','BRN',96,'brunei-darussalam'],
            ['Bulgaria','BG','BGR',100,'bulgaria'],
            ['Burkina Faso','BF','BFA',854,'burkina-faso'],
            ['Burundi','BI','BDI',108,'burundi'],
            ['Cambodia','KH','KHM',116,'cambodia'],
            ['Cameroon','CM','CMR',120,'cameroon'],
            ['Canada','CA','CAN',124,'canada'],
            ['Cape Verde','CV','CPV',132,'cape-verde'],
            ['Cayman Islands','KY','CYM',136,'cayman-islands'],
            ['Central African Republic','CF','CAF',140,'central-african-republic'],
            ['Chad','TD','TCD',148,'chad'],
            ['Chile','CL','CHL',152,'chile'],
            ['China','CN','CHN',156,'china'],
            ['Hong Kong','HK','HKG',344,'hong-kong'],
            ['Macao','MO','MAC',446,'macao'],
            ['Colombia','CO','COL',170,'colombia'],
            ['Comoros','KM','COM',174,'comoros'],
            ['Congo','CG','COG',178,'congo'],
            ['Democratic Republic of th] Congo','CD','COD',180,'democratic-republic-of-congo'],
            ['Cook Islands','CK','COK',184,'cook-islands'],
            ['Costa Rica','CR','CRI',188,'costa-rica'],
            ['Cote d\'Ivoire','CI','CIV',384,'cote-divoire'],
            ['Croatia','HR','HRV',191,'croatia'],
            ['Cuba','CU','CUB',192,'cuba'],
            ['Cyprus','CY','CYP',196,'cyprus'],
            ['Czech Republic','CZ','CZE',203,'czech-republic'],
            ['North Korea','KP','PRK',408,'north-korea'],
            ['Denmark','DK','DNK',208,'denmark'],
            ['Djibouti','DJ','DJI',262,'djibouti'],
            ['Dominica','DM','DMA',212,'dominica'],
            ['Dominican Republic','DO','DOM',214,'dominican-republic'],
            ['Ecuador','EC','ECU',218,'ecuador'],
            ['Egypt','EG','EGY',818,'egypt'],
            ['El Salvador','SV','SLV',222,'el-salvador'],
            ['Equatorial Guinea','GQ','GNQ',226,'equatorial-guinea'],
            ['Eritrea','ER','ERI',232,'eritrea'],
            ['Estonia','EE','EST',233,'estonia'],
            ['Ethiopia','ET','ETH',231,'ethiopia'],
            ['Faeroe Islands','FO','FRO',234,'faeroe-islands'],
            ['Falkland Islands','FK','FLK',238,'falkland-islands'],
            ['Fiji','FJ','FJI',242,'fiji'],
            ['Finland','FI','FIN',246,'finland'],
            ['France','FR','FRA',250,'france'],
            ['French Guiana','GF','GUF',254,'french-guiana'],
            ['French Polynesia','PF','PYF',258,'french-polynesia'],
            ['Gabon','GA','GAB',266,'gabon'],
            ['Gambia','GM','GMB',270,'gambia'],
            ['Georgia','GE','GEO',268,'georgia'],
            ['Germany','DE','DEU',276,'germany'],
            ['Ghana','GH','GHA',288,'ghana'],
            ['Gibraltar','GI','GIB',292,'gibraltar'],
            ['Greece','GR','GRC',300,'greece'],
            ['Greenland','GL','GRL',304,'greenland'],
            ['Grenada','GD','GRD',308,'grenada'],
            ['Guadeloupe','GP','GLP',312,'guadeloupe'],
            ['Guam','GU','GUM',316,'guam'],
            ['Guatemala','GT','GTM',320,'guatemala'],
            ['Guernsey','GG','GGY',831,'guernsey'],
            ['Guinea','GN','GIN',324,'guinea'],
            ['Guinea-Bissau','GW','GNB',624,'guinea-bissau'],
            ['Guyana','GY','GUY',328,'guyana'],
            ['Haiti','HT','HTI',332,'haiti'],
            ['Holy See','VA','VAT',336,'holy-see'],
            ['Honduras','HN','HND',340,'honduras'],
            ['Hungary','HU','HUN',348,'hungary'],
            ['Iceland','IS','ISL',352,'iceland'],
            ['India','IN','IND',356,'india'],
            ['Indonesia','ID','IDN',360,'indonesia'],
            ['Iran','IR','IRN',364,'iran'],
            ['Iraq','IQ','IRQ',368,'iraq'],
            ['Ireland','IE','IRL',372,'ireland'],
            ['Isle of Man','IM','IMN',833,'isle-of-man'],
            ['Israel','IL','ISR',376,'israel'],
            ['Italy','IT','ITA',380,'italy'],
            ['Jamaica','JM','JAM',388,'jamaica'],
            ['Japan','JP','JPN',392,'japan'],
            ['Jersey','JE','JEY',832,'jersey'],
            ['Jordan','JO','JOR',400,'jordan'],
            ['Kazakhstan','KZ','KAZ',398,'kazakhstan'],
            ['Kenya','KE','KEN',404,'kenya'],
            ['Kiribati','KI','KIR',296,'kiribati'],
            ['Kuwait','KW','KWT',414,'kuwait'],
            ['Kyrgyzstan','KG','KGZ',417,'kyrgyzstan'],
            ['Laos','LA','LAO',418,'laos'],
            ['Latvia','LV','LVA',428,'latvia'],
            ['Lebanon','LB','LBN',422,'lebanon'],
            ['Lesotho','LS','LSO',426,'lesotho'],
            ['Liberia','LR','LBR',430,'liberia'],
            ['Libyan Arab Jamahiriya','LY','LBY',434,'libyan-arab-jamahiriya'],
            ['Liechtenstein','LI','LIE',438,'liechtenstein'],
            ['Lithuania','LT','LTU',440,'lithuania'],
            ['Luxembourg','LU','LUX',442,'luxembourg'],
            ['Madagascar','MG','MDG',450,'madagascar'],
            ['Malawi','MW','MWI',454,'malawi'],
            ['Malaysia','MY','MYS',458,'malaysia'],
            ['Maldives','MV','MDV',462,'maldives'],
            ['Mali','ML','MLI',466,'mali'],
            ['Malta','MT','MLT',470,'malta'],
            ['Marshall Islands','MH','MHL',584,'marshall-islands'],
            ['Martinique','MQ','MTQ',474,'martinique'],
            ['Mauritania','MR','MRT',478,'mauritania'],
            ['Mauritius','MU','MUS',480,'mauritius'],
            ['Mayotte','YT','MYT',175,'mayotte'],
            ['Mexico','MX','MEX',484,'mexico'],
            ['Micronesia','FM','FSM',583,'micronesia'],
            ['Monaco','MC','MCO',492,'monaco'],
            ['Mongolia','MN','MNG',496,'mongolia'],
            ['Montenegro','ME','MNE',499,'montenegro'],
            ['Montserrat','MS','MSR',500,'montserrat'],
            ['Morocco','MA','MAR',504,'morocco'],
            ['Mozambique','MZ','MOZ',508,'mozambique'],
            ['Myanmar','MM','MMR',104,'myanmar'],
            ['Namibia','NA','NAM',516,'namibia'],
            ['Nauru','NR','NRU',520,'nauru'],
            ['Nepal','NP','NPL',524,'nepal'],
            ['Netherlands','NL','NLD',528,'netherlands'],
            ['Netherlands Antilles','AN','ANT',530,'netherlands-antilles'],
            ['New Caledonia','NC','NCL',540,'new-caledonia'],
            ['New Zealand','NZ','NZL',554,'new-zealand'],
            ['Nicaragua','NI','NIC',558,'nicaragua'],
            ['Niger','NE','NER',562,'niger'],
            ['Nigeria','NG','NGA',566,'nigeria'],
            ['Niue','NU','NIU',570,'niue'],
            ['Norfolk Island','NF','NFK',574,'norfolk-island'],
            ['Northern Mariana Islands','MP','MNP',580,'northern-mariana-islands'],
            ['Norway','NO','NOR',578,'norway'],
            ['Palestine','PS','PSE',275,'palestine'],
            ['Oman','OM','OMN',512,'oman'],
            ['Pakistan','PK','PAK',586,'pakistan'],
            ['Palau','PW','PLW',585,'palau'],
            ['Panama','PA','PAN',591,'panama'],
            ['Papua New Guinea','PG','PNG',598,'papua-new-guinea'],
            ['Paraguay','PY','PRY',600,'paraguay'],
            ['Peru','PE','PER',604,'peru'],
            ['Philippines','PH','PHL',608,'philippines'],
            ['Pitcairn','PN','PCN',612,'pitcairn'],
            ['Poland','PL','POL',616,'poland'],
            ['Portugal','PT','PRT',620,'portugal'],
            ['Puerto Rico','PR','PRI',630,'puerto-rico'],
            ['Qatar','QA','QAT',634,'qatar'],
            ['South Korea','KR','KOR',410,'south-korea'],
            ['Moldova','MD','MDA',498,'moldova'],
            ['Reunion','RE','REU',638,'reunion'],
            ['Romania','RO','ROU',642,'romania'],
            ['Russian Federation','RU','RUS',643,'russian-federation'],
            ['Rwanda','RW','RWA',646,'rwanda'],
            ['Saint-Barthelemy','BL','BLM',652,'saint-barthelemy'],
            ['Saint Helena','SH','SHN',654,'saint-helena'],
            ['Saint Kitts and Nevis','KN','KNA',659,'saint-kitts-and-nevis'],
            ['Saint Lucia','LC','LCA',662,'saint-lucia'],
            ['Saint-Martin','MF','MAF',663,'saint-martin'],
            ['Saint Pierre and Miquelon','PM','SPM',666,'saint-pierre-and-miquelon'],
            ['Saint Vincent and th] Grenadines','VC','VCT',670,'saint-vincent-and-grenadines'],
            ['Samoa','WS','WSM',882,'samoa'],
            ['San Marino','SM','SMR',674,'san-marino'],
            ['Sao Tome and Principe','ST','STP',678,'sao-tome-and-principe'],
            ['Saudi Arabia','SA','SAU',682,'saudi-arabia'],
            ['Senegal','SN','SEN',686,'senegal'],
            ['Serbia','RS','SRB',688,'serbia'],
            ['Seychelles','SC','SYC',690,'seychelles'],
            ['Sierra Leone','SL','SLE',694,'sierra-leone'],
            ['Singapore','SG','SGP',702,'singapore'],
            ['Slovakia','SK','SVK',703,'slovakia'],
            ['Slovenia','SI','SVN',705,'slovenia'],
            ['Solomon Islands','SB','SLB',90,'solomon-islands'],
            ['Somalia','SO','SOM',706,'somalia'],
            ['South Africa','ZA','ZAF',710,'south-africa'],
            ['Spain','ES','ESP',724,'spain'],
            ['Sri Lanka','LK','LKA',144,'sri-lanka'],
            ['Sudan','SD','SDN',729,'sudan'],
            ['Suriname','SR','SUR',740,'suriname'],
            ['Svalbard and Jan Maye] Islands','SJ','SJM',744,'svalbard-and-jan-mayen-islands'],
            ['Swaziland','SZ','SWZ',748,'swaziland'],
            ['Sweden','SE','SWE',752,'sweden'],
            ['Switzerland','CH','CHE',756,'switzerland'],
            ['Syrian Arab Republic','SY','SYR',760,'syrian-arab-republic'],
            ['Tajikistan','TJ','TJK',762,'tajikistan'],
            ['Thailand','TH','THA',764,'thailand'],
            ['Macedonia','MK','MKD',807,'macedonia'],
            ['Timor-Leste','TP','TLS',626,'timor-leste'],
            ['Togo','TG','TGO',768,'togo'],
            ['Tokelau','TK','TKL',772,'tokelau'],
            ['Tonga','TO','TON',776,'tonga'],
            ['Trinidad and Tobago','TT','TTO',780,'trinidad-and-tobago'],
            ['Tunisia','TN','TUN',788,'tunisia'],
            ['Turkey','TR','TUR',792,'turkey'],
            ['Turkmenistan','TM','TKM',795,'turkmenistan'],
            ['Turks and Caicos Islands','TC','TCA',796,'turks-and-caicos-islands'],
            ['Tuvalu','TV','TUV',798,'tuvalu'],
            ['Uganda','UG','UGA',800,'uganda'],
            ['Ukraine','UA','UKR',804,'ukraine'],
            ['United Arab Emirates','AE','ARE',784,'united-arab-emirates'],
            ['United Kingdom','UK','GBR',826,'united-kingdom'],
            ['Tanzania','TZ','TZA',834,'tanzania'],
            ['United States','US','USA',840,'united-states'],
            ['U.S. Virgin Islands','VI','VIR',850,'us-virgin-islands'],
            ['Uruguay','UY','URY',858,'uruguay'],
            ['Uzbekistan','UZ','UZB',860,'uzbekistan'],
            ['Vanuatu','VU','VUT',548,'vanuatu'],
            ['Venezuela','VE','VEN',862,'venezuela'],
            ['Viet Nam','VN','VNM',704,'viet-nam'],
            ['Wallis and Futuna Islands','WF','WLF',876,'wallis-and-futuna-islands'],
            ['Western Sahara','EH','ESH',732,'western-sahara'],
            ['Yemen','YE','YEM',887,'yemen'],
            ['Zambia','ZM','ZMB',894,'zambia'],
            ['Zimbabwe','ZW','ZWE',716,'zimbabwe'],
            ['South Sudan','SS','SSD',728,'south-sudan']
            ];
        foreach ($array as $key => $value):
        $array2[] = [
            'name'       => $value[0],
            'iso_code_2' => $value[1],
            'iso_code_3' => $value[2],
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ];
        endforeach ;
        DB::table('countries')->insert($array2);
    }
}