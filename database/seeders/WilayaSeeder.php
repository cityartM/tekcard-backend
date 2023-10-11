<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class WilayaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wilayas =[
            ['country_id'=>1,'code'=>'1','name' => json_encode(['en'=>'Adrar', 'fr'=>'Adrar', 'ar'=>'أدرار']), 'lon'=>'27.9766155', 'lat'=>'-0.20396'],
            ['country_id'=>1,'code'=>'2','name' => json_encode(['en'=>'Chlef', 'fr'=>'Chlef', 'ar'=>'الشلف']), 'lon'=>'36.1691245', 'lat'=>'1.3539002'],
            ['country_id'=>1,'code'=>'3','name' => json_encode(['en'=>'Laghouat', 'fr'=>'Laghouat', 'ar'=>'الأغواط']), 'lon'=>'33.7873735', 'lat'=>'2.8829115'],
            ['country_id'=>1,'code'=>'4','name' => json_encode(['en'=>'Oum El Bouaghi', 'fr'=>'Oum El Bouaghi', 'ar'=>'أم البواقي']), 'lon'=>'35.8726014', 'lat'=>'7.1180248'],
            ['country_id'=>1,'code'=>'5','name' => json_encode(['en'=>'Batna', 'fr'=>'Batna', 'ar'=>'باتنة']), 'lon'=>'35.32147', 'lat'=>'3.1066502'],
            ['country_id'=>1,'code'=>'6','name' => json_encode(['en'=>'Béjaïa', 'fr'=>'Béjaïa', 'ar'=>'بجاية']), 'lon'=>'36.7695969', 'lat'=>'5.0085855'],
            ['country_id'=>1,'code'=>'7','name' => json_encode(['en'=>'Biskra', 'fr'=>'Biskra', 'ar'=>'بسكرة']), 'lon'=>'34.8515041', 'lat'=>'5.7246709'],
            ['country_id'=>1,'code'=>'8','name' => json_encode(['en'=>'Bechar', 'fr'=>'Bechar', 'ar'=>'بشار']), 'lon'=>'31.5977602', 'lat'=>'-1.8540446'],
            ['country_id'=>1,'code'=>'9','name' => json_encode(['en'=>'Blida', 'fr'=>'Blida', 'ar'=>'البليدة']), 'lon'=>'36.4803023', 'lat'=>'2.8009379'],
            ['country_id'=>1,'code'=>'10','name' => json_encode(['en'=>'Bouira', 'fr'=>'Bouira', 'ar'=>'البويرة']), 'lon'=>'36.2084234', 'lat'=>'3.925049'],
            ['country_id'=>1,'code'=>'11','name' => json_encode(['en'=>'Tamanrasset', 'fr'=>'Tamanrasset', 'ar'=>'تمنراست']), 'lon'=>'22.2746227', 'lat'=>'5.6754684'],
            ['country_id'=>1,'code'=>'12','name' => json_encode(['en'=>'Tbessa', 'fr'=>'Tbessa', 'ar'=>'تبسة']), 'lon'=>'35.4117259', 'lat'=>'8.110545'],
            ['country_id'=>1,'code'=>'13','name' => json_encode(['en'=>'Tlemcen', 'fr'=>'Tlemcen', 'ar'=>'تلمسان']), 'lon'=>'34.8959541', 'lat'=>'-1.3150979'],
            ['country_id'=>1,'code'=>'14','name' => json_encode(['en'=>'Tiaret', 'fr'=>'Tiaret', 'ar'=>'تيارت']), 'lon'=>'35.3599899', 'lat'=>'1.3916159'],
            ['country_id'=>1,'code'=>'15','name' => json_encode(['en'=>'Tizi Ouzou', 'fr'=>'Tizi Ouzou', 'ar'=>'تيزي وزو']), 'lon'=>'36.7002068', 'lat'=>'4.075957'],
            ['country_id'=>1,'code'=>'16','name' => json_encode(['en'=>'Alger', 'fr'=>'Alger', 'ar'=>'الجزائر']), 'lon'=>'36.7538259', 'lat'=>'3.057841'],
            ['country_id'=>1,'code'=>'17','name' => json_encode(['en'=>'Djelfa', 'fr'=>'Djelfa', 'ar'=>'الجلفة']), 'lon'=>'34.6672467', 'lat'=>'3.2993118'],
            ['country_id'=>1,'code'=>'18','name' => json_encode(['en'=>'Jijel', 'fr'=>'Jijel', 'ar'=>'جيجل']), 'lon'=>'36.7962714', 'lat'=>'5.7504845'],
            ['country_id'=>1,'code'=>'19','name' => json_encode(['en'=>'Setif', 'fr'=>'Setif', 'ar'=>'سطيف']), 'lon'=>'36.1905173', 'lat'=>'5.4202134'],
            ['country_id'=>1,'code'=>'20','name' => json_encode(['en'=>'Saefda', 'fr'=>'Saefda', 'ar'=>'سعيدة']), 'lon'=>'34.841945', 'lat'=>'0.1483583'],
            ['country_id'=>1,'code'=>'21','name' => json_encode(['en'=>'Skikda', 'fr'=>'Skikda', 'ar'=>'سكيكدة']), 'lon'=>'36.8777912', 'lat'=>'6.9357204'],
            ['country_id'=>1,'code'=>'22','name' => json_encode(['en'=>'Sidi Bel Abbes', 'fr'=>'Sidi Bel Abbes', 'ar'=>'سيدي بلعباس']), 'lon'=>'35.206334', 'lat'=>'-0.6301368'],
            ['country_id'=>1,'code'=>'23','name' => json_encode(['en'=>'Annaba', 'fr'=>'Annaba', 'ar'=>'عنابة']), 'lon'=>'36.9184345', 'lat'=>'7.7452755'],
            ['country_id'=>1,'code'=>'24','name' => json_encode(['en'=>'Guelma', 'fr'=>'Guelma', 'ar'=>'قالمة']), 'lon'=>'36.4569088', 'lat'=>'7.4334312'],
            ['country_id'=>1,'code'=>'25','name' => json_encode(['en'=>'Constantine', 'fr'=>'Constantine', 'ar'=>'قسنطينة']), 'lon'=>'36.319475', 'lat'=>'6.7370571'],
            ['country_id'=>1,'code'=>'26','name' => json_encode(['en'=>'Medea', 'fr'=>'Medea', 'ar'=>'المدية']), 'lon'=>'36.2838408', 'lat'=>'2.7728462'],
            ['country_id'=>1,'code'=>'27','name' => json_encode(['en'=>'Mostaganem', 'fr'=>'Mostaganem', 'ar'=>'مستغانم']), 'lon'=>'35.9751841', 'lat'=>'0.1149273'],
            ['country_id'=>1,'code'=>'28','name' => json_encode(['en'=>'MSila', 'fr'=>'MSila', 'ar'=>'المسيلة']), 'lon'=>'35.7211476', 'lat'=>'4.5187283'],
            ['country_id'=>1,'code'=>'29','name' => json_encode(['en'=>'Mascara', 'fr'=>'Mascara', 'ar'=>'معسكر']), 'lon'=>'35.382998', 'lat'=>'0.1542592'],
            ['country_id'=>1,'code'=>'30','name' => json_encode(['en'=>'Ouargla', 'fr'=>'Ouargla', 'ar'=>'ورقلة']), 'lon'=>'32.1961967', 'lat'=>'4.9634113'],
            ['country_id'=>1,'code'=>'31','name' => json_encode(['en'=>'Oran', 'fr'=>'Oran', 'ar'=>'وهران']), 'lon'=>'35.7066928', 'lat'=>'-0.6405861'],
            ['country_id'=>1,'code'=>'32','name' => json_encode(['en'=>'El Bayadh', 'fr'=>'El Bayadh', 'ar'=>'البيض']), 'lon'=>'32.5722756', 'lat'=>'0.950011'],
            ['country_id'=>1,'code'=>'33','name' => json_encode(['en'=>'Illizi', 'fr'=>'Illizi', 'ar'=>'إليزي']), 'lon'=>'26.5065999', 'lat'=>'8.480587'],
            ['country_id'=>1,'code'=>'34','name' => json_encode(['en'=>'Bordj Bou Arreridj', 'fr'=>'Bordj Bou Arreridj', 'ar'=>'برج بوعريريج']), 'lon'=>'36.0686488', 'lat'=>'4.7691823'],
            ['country_id'=>1,'code'=>'35','name' => json_encode(['en'=>'Boumerdes', 'fr'=>'Boumerdes', 'ar'=>'بومرداس']), 'lon'=>'36.7564181', 'lat'=>'3.4917212'],
            ['country_id'=>1,'code'=>'36','name' => json_encode(['en'=>'El Tarf', 'fr'=>'El Tarf', 'ar'=>'الطارف']), 'lon'=>'36.7534258', 'lat'=>'8.2984543'],
            ['country_id'=>1,'code'=>'37','name' => json_encode(['en'=>'Tindouf', 'fr'=>'Tindouf', 'ar'=>'تندوف']), 'lon'=>'27.2460501', 'lat'=>'-6.3252899'],
            ['country_id'=>1,'code'=>'38','name' => json_encode(['en'=>'Tissemsilt', 'fr'=>'Tissemsilt', 'ar'=>'تيسمسيلت']), 'lon'=>'35.6021906', 'lat'=>'1.802187'],
            ['country_id'=>1,'code'=>'39','name' => json_encode(['en'=>'El Oued', 'fr'=>'El Oued', 'ar'=>'الوادي']), 'lon'=>'33.3714492', 'lat'=>'6.8573436'],
            ['country_id'=>1,'code'=>'40','name' => json_encode(['en'=>'Khenchela', 'fr'=>'Khenchela', 'ar'=>'خنشلة']), 'lon'=>'35.4263293', 'lat'=>'7.1414137'],
            ['country_id'=>1,'code'=>'41','name' => json_encode(['en'=>'Souk Ahras', 'fr'=>'Souk Ahras', 'ar'=>'سوق أهراس']), 'lon'=>'36.277849', 'lat'=>'7.9592299'],
            ['country_id'=>1,'code'=>'42','name' => json_encode(['en'=>'Tipaza', 'fr'=>'Tipaza', 'ar'=>'تيبازة']), 'lon'=>'36.5980966', 'lat'=>'2.4085379'],
            ['country_id'=>1,'code'=>'43','name' => json_encode(['en'=>'Mila', 'fr'=>'Mila', 'ar'=>'ميلة']), 'lon'=>'36.4514882', 'lat'=>'6.2487316'],
            ['country_id'=>1,'code'=>'44','name' => json_encode(['en'=>'Ain Defla', 'fr'=>'Ain Defla', 'ar'=>'عين الدفلى']), 'lon'=>'36.1283915', 'lat'=>'2.1772514'],
            ['country_id'=>1,'code'=>'45','name' => json_encode(['en'=>'Naama', 'fr'=>'Naama', 'ar'=>'النعامة']), 'lon'=>'33.1995605', 'lat'=>'-0.8021968'],
            ['country_id'=>1,'code'=>'46','name' => json_encode(['en'=>'Ain Temouchent', 'fr'=>'Ain Temouchent', 'ar'=>'عين تموشنت']), 'lon'=>'35.404044', 'lat'=>'-1.0580975'],
            ['country_id'=>1,'code'=>'47','name' => json_encode(['en'=>'Ghardaefa', 'fr'=>'Ghardaefa', 'ar'=>'غرداية']), 'lon'=>'32.5891743', 'lat'=>'3.7455655'],
            ['country_id'=>1,'code'=>'48','name' => json_encode(['en'=>'Relizane', 'fr'=>'Relizane', 'ar'=>'غليزان']), 'lon'=>'35.8050195', 'lat'=>'0.867381'],
            ['country_id'=>1,'code'=>'49','name' => json_encode(['en'=>'El Mghair', 'fr'=>'El Mghair', 'ar'=>'المغير']), 'lon'=>'33.947222', 'lat'=>'5.922222'],
            ['country_id'=>1,'code'=>'50','name' => json_encode(['en'=>'El Menia', 'fr'=>'El Menia', 'ar'=>'المنيعة']), 'lon'=>'30.579167', 'lat'=>'2.879167'],
            ['country_id'=>1,'code'=>'51','name' => json_encode(['en'=>'Ouled Djellal', 'fr'=>'Ouled Djellal', 'ar'=>'أولاد جلال']), 'lon'=>'34.433333', 'lat'=>'5.066667'],
            ['country_id'=>1,'code'=>'52','name' => json_encode(['en'=>'Bordj Baji Mokhtar', 'fr'=>'Bordj Baji Mokhtar', 'ar'=>'برج باجي مختار']), 'lon'=>'21.327778', 'lat'=>'0.955556'],
            ['country_id'=>1,'code'=>'53','name' => json_encode(['en'=>'Béni Abbès', 'fr'=>'Béni Abbès', 'ar'=>'بني عباس']), 'lon'=>'30.133333', 'lat'=>'-2.166667'],
            ['country_id'=>1,'code'=>'54','name' => json_encode(['en'=>'Timimoun', 'fr'=>'Timimoun', 'ar'=>'تيميمون']), 'lon'=>'29.258333', 'lat'=>'0.230556'],
            ['country_id'=>1,'code'=>'55','name' => json_encode(['en'=>'Touggourt', 'fr'=>'Touggourt', 'ar'=>'تقرت']), 'lon'=>'33.108333', 'lat'=>'6.063889'],
            ['country_id'=>1,'code'=>'56','name' => json_encode(['en'=>'Djanet', 'fr'=>'Djanet', 'ar'=>'جانت']), 'lon'=>'24.554167', 'lat'=>'9.484722'],
            ['country_id'=>1,'code'=>'57','name' => json_encode(['en'=>'In Salah', 'fr'=>'In Salah', 'ar'=>'عين صالح']), 'lon'=>'27.197222', 'lat'=>'2.483333'],
            ['country_id'=>1,'code'=>'58','name' => json_encode(['en'=>'In Guezzam', 'fr'=>'In Guezzam', 'ar'=>'عين قزام']), 'lon'=>'19.572222', 'lat'=>'5.769444']
        ];

        // Insert the data into the "wilayas" table
        DB::table('wilayas')->insert($wilayas);
    }
}
