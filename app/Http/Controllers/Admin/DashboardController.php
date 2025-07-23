<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Product_table_list;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        if ($request->tag == 'saeed') {
            //            dd('asd');
            //                    $this->process();
        }

        return view('admin.dashboard.dashboard');
    }

    public function process()
    {
        //        https://www.seabreezecomputers.com/excel2array/

        //
        //        $arr_11 = array(
        //            array(
        //                "height" => "735",
        //                "diameter" => "340",
        //                "name" => "مخزن 65000 ليتري عمودي"),
        //            array(
        //                "height" => "735",
        //                "diameter" => "340",
        //                "name" => "مخزن 65000 لیتری عمودی سه لایه"),
        //            array(
        //                "height" => "520",
        //                "diameter" => "340",
        //                "name" => "مخزن 45000 ليتري عمودي"),
        //            array(
        //                "height" => "690",
        //                "diameter" => "245",
        //                "name" => "مخزن 35000 ليتري عمودي"),
        //            array(
        //                "height" => "475",
        //                "diameter" => "304",
        //                "name" => "مخزن 30000 لیتری عمودی"),
        //            array(
        //                "height" => "475",
        //                "diameter" => "304",
        //                "name" => "مخزن 30000 عمودی سه لایه"),
        //            array(
        //                "height" => "540",
        //                "diameter" => "245",
        //                "name" => "مخزن 25000 ليتري عمودي"),
        //            array(
        //                "height" => "440",
        //                "diameter" => "260",
        //                "name" => "مخزن 20000 عمودی بلند"),
        //            array(
        //                "height" => "440",
        //                "diameter" => "260",
        //                "name" => "مخزن 20000 عمودی بلند دو لایه"),
        //            array(
        //                "height" => "440",
        //                "diameter" => "260",
        //                "name" => "مخزن 20000 عمودی بلند سه لایه"),
        //            array(
        //                "height" => "245",
        //                "diameter" => "340",
        //                "name" => "مخزن 20000 عمودی کوتاه"),
        //            array(
        //                "height" => "245",
        //                "diameter" => "340",
        //                "name" => "مخزن 20000 عمودی کوتاه سه لایه"),
        //            array(
        //                "height" => "250",
        //                "diameter" => "297",
        //                "name" => "مخزن 15000 ليتري عمودي"),
        //            array(
        //                "height" => "250",
        //                "diameter" => "297",
        //                "name" => "مخزن 15000 ليتري عمودي دو لايه "),
        //            array(
        //                "height" => "250",
        //                "diameter" => "297",
        //                "name" => "مخزن 15000 ليتري عمودي سه لايه"),
        //            array(
        //                "height" => "420",
        //                "diameter" => "205",
        //                "name" => "مخزن 12000 ليتري عمودي"),
        //            array(
        //                "height" => "420",
        //                "diameter" => "205",
        //                "name" => "مخزن 12000 ليتري عمودي دو لايه"),
        //            array(
        //                "height" => "420",
        //                "diameter" => "205",
        //                "name" => "مخزن 12000 ليتري عمودي سه لايه"),
        //            array(
        //                "height" => "310",
        //                "diameter" => "225",
        //                "name" => "مخزن 10000 لیتری عمودی بلند"),
        //            array(
        //                "height" => "310",
        //                "diameter" => "225",
        //                "name" => "مخزن 10000 لیتری عمودی بلند دو لایه"),
        //            array(
        //                "height" => "310",
        //                "diameter" => "225",
        //                "name" => "مخزن 10000 لیتری عمودی بلند سه  لایه"),
        //            array(
        //                "height" => "230",
        //                "diameter" => "240",
        //                "name" => "مخزن 10000 عمودی کوتاه"),
        //            array(
        //                "height" => "230",
        //                "diameter" => "240",
        //                "name" => "مخزن 10000 عمودی کوتاه سه لایه"),
        //            array(
        //                "height" => "215",
        //                "diameter" => "210",
        //                "name" => "مخزن 7000 ليتري عمودي"),
        //            array(
        //                "height" => "215",
        //                "diameter" => "210",
        //                "name" => "مخزن 7000 ليتري عمودي دو لايه"),
        //            array(
        //                "height" => "215",
        //                "diameter" => "210",
        //                "name" => "مخزن 7000 ليتري عمودي سه لايه"),
        //            array(
        //                "height" => "215",
        //                "diameter" => "190",
        //                "name" => "مخزن 5000 لیتری عمودی دو درب بلند"),
        //            array(
        //                "height" => "215",
        //                "diameter" => "190",
        //                "name" => "مخزن 5000 لیتری عمودی دو درب بلند دو لایه"),
        //            array(
        //                "height" => "215",
        //                "diameter" => "190",
        //                "name" => "مخزن 5000 لیتری عمودی دو درب بلند سه لایه"),
        //            array(
        //                "height" => "165",
        //                "diameter" => "210",
        //                "name" => "مخزن 5000 عمودی کوتاه تک لایه"),
        //            array(
        //                "height" => "165",
        //                "diameter" => "210",
        //                "name" => "مخزن 5000 عمودی کوتاه دولایه"),
        //            array(
        //                "height" => "165",
        //                "diameter" => "210",
        //                "name" => "مخزن 5000 عمودی کوتاه  سه لایه"),
        //            array(
        //                "height" => "210",
        //                "diameter" => "165",
        //                "name" => "مخزن 4000 عمودی درب پیچی بلند"),
        //            array(
        //                "height" => "210",
        //                "diameter" => "165",
        //                "name" => "مخزن 4000 عمودی درب پیچی بلند دو لایه"),
        //            array(
        //                "height" => "210",
        //                "diameter" => "165",
        //                "name" => "مخزن 4000 عمودی درب پیچی بلند سه لایه"),
        //            array(
        //                "height" => "108",
        //                "diameter" => "250",
        //                "name" => "مخزن 4000 عمودی کوتاه"),
        //            array(
        //                "height" => "200",
        //                "diameter" => "160",
        //                "name" => "مخزن 3000 عمودی تک لایه"),
        //            array(
        //                "height" => "200",
        //                "diameter" => "160",
        //                "name" => "مخزن 3000 ليتري عمودي دو لايه"),
        //            array(
        //                "height" => "200",
        //                "diameter" => "160",
        //                "name" => "مخزن 3000 ليتري عمودي سه لايه"),
        //            array(
        //                "height" => "190",
        //                "diameter" => "135",
        //                "name" => "مخزن 2500 ليتري عمودي تك لايه"),
        //            array(
        //                "height" => "190",
        //                "diameter" => "135",
        //                "name" => "مخزن 2500 ليتري عمودي دو لايه"),
        //            array(
        //                "height" => "190",
        //                "diameter" => "135",
        //                "name" => "مخزن 2500 ليتري عمودي سه لايه"),
        //            array(
        //                "height" => "175",
        //                "diameter" => "130",
        //                "name" => "مخزن 2000 ليتري عمودي کوتاه"),
        //            array(
        //                "height" => "175",
        //                "diameter" => "130",
        //                "name" => "مخزن 2000 ليتري عمودي کوتاه دو لايه"),
        //            array(
        //                "height" => "175",
        //                "diameter" => "130",
        //                "name" => "مخزن 2000 لیتری عمودی سه لایه کوتاه"),
        //            array(
        //                "height" => "240",
        //                "diameter" => "110",
        //                "name" => "مخزن 2000 ليتري عمودي بلند"),
        //            array(
        //                "height" => "240",
        //                "diameter" => "110",
        //                "name" => "مخزن 2000 ليتري عمودي بلند دو لایه"),
        //            array(
        //                "height" => "240",
        //                "diameter" => "110",
        //                "name" => "مخزن 2000 ليتري عمودي بلند سه لایه"),
        //            array(
        //                "height" => "180",
        //                "diameter" => "115",
        //                "name" => "مخزن 1500 لیتری عمودی درب کوچک"),
        //            array(
        //                "height" => "175",
        //                "diameter" => "115",
        //                "name" => "مخزن 1500 لیتری عمودی درب بزرگ"),
        //            array(
        //                "height" => "175",
        //                "diameter" => "115",
        //                "name" => "مخزن 1500 لیتری عمودی درب بزرگ دو لايه"),
        //            array(
        //                "height" => "175",
        //                "diameter" => "115",
        //                "name" => "مخزن 1500 لیتری عمودی درب بزرگ سه لايه"),
        //            array(
        //                "height" => "175",
        //                "diameter" => "105",
        //                "name" => "مخزن 1300 عمودی"),
        //            array(
        //                "height" => "205",
        //                "diameter" => "83",
        //                "name" => "مخزن 1000 ليتري عمودي بلند جديد"),
        //            array(
        //                "height" => "205",
        //                "diameter" => "83",
        //                "name" => "مخزن 1000 ليتري عمودي بلند دو لايه"),
        //            array(
        //                "height" => "205",
        //                "diameter" => "83",
        //                "name" => "مخزن 1000 ليتري عمودي بلند سه لايه"),
        //            array(
        //                "height" => "160",
        //                "diameter" => "105",
        //                "name" => "مخزن 1000 ليتري عمودي متوسط"),
        //            array(
        //                "height" => "160",
        //                "diameter" => "105",
        //                "name" => "مخزن 1000 ليتري عمودي متوسط دولايه"),
        //            array(
        //                "height" => "160",
        //                "diameter" => "105",
        //                "name" => "مخزن 1000 ليتري عمودي متوسط سه لايه"),
        //            array(
        //                "height" => "130",
        //                "diameter" => "115",
        //                "name" => "مخزن 1000 ليتري عمودي کوتاه"),
        //            array(
        //                "height" => "130",
        //                "diameter" => "115",
        //                "name" => "مخزن 1000 ليتري عمودي کوتاه دو لايه"),
        //            array(
        //                "height" => "130",
        //                "diameter" => "115",
        //                "name" => "مخزن 1000 ليتري عمودي کوتاه سه لايه"),
        //            array(
        //                "height" => "125",
        //                "diameter" => "123",
        //                "name" => "مخزن 1000 لیتری عمودی طرح دار"),
        //            array(
        //                "height" => "125",
        //                "diameter" => "123",
        //                "name" => "مخزن 1000 لیتری عمودی طرح دار دو لایه"),
        //            array(
        //                "height" => "125",
        //                "diameter" => "133",
        //                "name" => "مخزن 1000 عمودی طرح دار سه لایه"),
        //            array(
        //                "height" => "125",
        //                "diameter" => "123",
        //                "name" => "مخزن 1000 لیتری عمودی طرح دار گرانیتی"),
        //            array(
        //                "height" => "115",
        //                "diameter" => "85",
        //                "name" => "مخزن 500 لیتری عمودی با درب پیچی کوتاه"),
        //            array(
        //                "height" => "171",
        //                "diameter" => "70",
        //                "name" => "مخزن 500 ليتري عمودي بلند جديد"),
        //            array(
        //                "height" => "171",
        //                "diameter" => "70",
        //                "name" => "مخزن 500 ليتري عمودي بلند دو لايه"),
        //            array(
        //                "height" => "171",
        //                "diameter" => "70",
        //                "name" => "مخزن 500 ليتري عمودي بلند سه لايه"),
        //            array(
        //                "height" => "120",
        //                "diameter" => "85",
        //                "name" => "مخزن 500 ليتري عمودي درب ساده"),
        //            array(
        //                "height" => "115",
        //                "diameter" => "85",
        //                "name" => "مخزن 500 لیتری عمود کوتاه تک لایه"),
        //            array(
        //                "height" => "115",
        //                "diameter" => "85",
        //                "name" => "مخزن 500 ليتري کوتاه دو لایه"),
        //            array(
        //                "height" => "115",
        //                "diameter" => "85",
        //                "name" => "مخزن 500 ليتري کوتاه سه لایه"),
        //            array(
        //                "height" => "120",
        //                "diameter" => "85",
        //                "name" => "مخزن 500 ليتري عمود ( سبک )"),
        //            array(
        //                "height" => "127",
        //                "diameter" => "83",
        //                "name" => "مخزن 500 ليتري عمودي سکودار بلند"),
        //            array(
        //                "height" => "160",
        //                "diameter" => "86",
        //                "name" => "مخزن 700 لیتری عمودی تک لایه"),
        //            array(
        //                "height" => "160",
        //                "diameter" => "86",
        //                "name" => "مخزن 700 لیتری عمودی دو لایه"),
        //            array(
        //                "height" => "160",
        //                "diameter" => "86",
        //                "name" => "مخزن 700 لیتری عمودی سه لایه"),
        //            array(
        //                "height" => "225",
        //                "diameter" => "44",
        //                "name" => "مخزن 333 ليتري افقي مارل تريلر بلند"),
        //            array(
        //                "height" => "110",
        //                "diameter" => "62",
        //                "name" => "مخزن 300 ليتري عمودي دهان گشاد"),
        //            array(
        //                "height" => "110",
        //                "diameter" => "62",
        //                "name" => "مخزن 300 ليتري عمودي دهان گشاد سه لايه"),
        //            array(
        //                "height" => "120",
        //                "diameter" => "70",
        //                "name" => "مخزن 300 ليتري عمودي با درب برنجی"),
        //            array(
        //                "height" => "110",
        //                "diameter" => "70",
        //                "name" => "مخزن 300 ليتري عمودي مدرج-تک لایه"),
        //            array(
        //                "height" => "-",
        //                "diameter" => "-",
        //                "name" => "مخزن 300 لیترعمودی سکودار-سه لایه"),
        //            array(
        //                "height" => "-",
        //                "diameter" => "-",
        //                "name" => "مخزن 220 ليتري عمودي سکودار اقيانوس آبي"),
        //            array(
        //                "height" => "78",
        //                "diameter" => "65",
        //                "name" => "مخزن 220 ليتري عمودي با 12 عدد مهره برنجي. اقيانوس"),
        //            array(
        //                "height" => "-",
        //                "diameter" => "-",
        //                "name" => "مخزن 220 ليتري عمودي ( انبساط )"),
        //            array(
        //                "height" => "93",
        //                "diameter" => "57",
        //                "name" => "بشکه 220 ليتري عمودي دو درب"),
        //            array(
        //                "height" => "110",
        //                "diameter" => "60",
        //                "name" => "مخزن 220 ليتري عمودي درب پيچي"),
        //            array(
        //                "height" => "110",
        //                "diameter" => "60",
        //                "name" => "مخزن 220 ليتري عمودي درب پيچي سه لايه"),
        //            array(
        //                "height" => "100",
        //                "diameter" => "60",
        //                "name" => "بشکه 220 ليتري عمودي دهان گشاد درب ساده"),
        //            array(
        //                "height" => "103",
        //                "diameter" => "60",
        //                "name" => "بشکه 220 ليتري عمودي دهان گشاد ( سبک )"),
        //            array(
        //                "height" => "95",
        //                "diameter" => "56",
        //                "name" => "مخزن 220 عمودی خمره ای"),
        //            array(
        //                "height" => "-",
        //                "diameter" => "-",
        //                "name" => "مخزن 200 لیترعمودی تک لایه"),
        //            array(
        //                "height" => "-",
        //                "diameter" => "-",
        //                "name" => "مخزن 200 لیترعمودی 3 لایه"),
        //            array(
        //                "height" => "147",
        //                "diameter" => "44",
        //                "name" => "مخزن 200 ليتري  مارال تريلر"),
        //            array(
        //                "height" => "70",
        //                "diameter" => "45",
        //                "name" => "مخزن 100 ليتري عمودي ( انبساط )"),
        //            array(
        //                "height" => "68",
        //                "diameter" => "45",
        //                "name" => "مخزن 100 ليتري عمودي ( انبساط ) ( دو لايه )"),
        //            array(
        //                "height" => "65",
        //                "diameter" => "45",
        //                "name" => "بشکه 70 ليتري عمودي دهان گشاد"),
        //            array(
        //                "height" => "60",
        //                "diameter" => "28",
        //                "name" => "مخزن 60 ليتري عمودي دو درب"),
        //            array(
        //                "height" => "65",
        //                "diameter" => "45",
        //                "name" => "مخزن 70 لیتری (بشکه)"),
        //            array(
        //                "height" => "-",
        //                "diameter" => "-",
        //                "name" => "مخزن 120 لیتری"),
        //            array(
        //                "height" => "65",
        //                "diameter" => "38",
        //                "name" => "مخزن 50 ليتري عمودي"),
        //            array(
        //                "height" => "-",
        //                "diameter" => "-",
        //                "name" => "مخزن 40 لیتری خمره ای"),
        //            array(
        //                "height" => "50",
        //                "diameter" => "47",
        //                "name" => "مخزن 40 لیتری سطلی")
        //        );
        //        $category = 11;

        //        $category = 12;
        //        $arr_12 = array(
        //            array(
        //                "Small diameter" => "215 ",
        //                "large diameter" => "236 ",
        //                "length" => "640 ",
        //                "name" => "مخزن 20000 افقی پایه دار تک لایه "),
        //            array(
        //                "Small diameter" => "215 ",
        //                "large diameter" => "236 ",
        //                "length" => "640 ",
        //                "name" => "مخزن 20000 افقی پایه دار سه لایه "),
        //            array(
        //                "Small diameter" => "155 ",
        //                "large diameter" => "215 ",
        //                "length" => "465 ",
        //                "name" => "مخزن 11000 ليتري افقي تک لايه "),
        //            array(
        //                "Small diameter" => "155 ",
        //                "large diameter" => "215 ",
        //                "length" => "465 ",
        //                "name" => "مخزن 11000 ليتري افقي  دو لايه "),
        //            array(
        //                "Small diameter" => "155 ",
        //                "large diameter" => "215 ",
        //                "length" => "465 ",
        //                "name" => "مخزن 11000 ليتري افقي  سه لايه "),
        //            array(
        //                "Small diameter" => "150 ",
        //                "large diameter" => "220 ",
        //                "length" => "330 ",
        //                "name" => "مخزن 7000 ليتري افقي"),
        //            array(
        //                "Small diameter" => "150 ",
        //                "large diameter" => "220 ",
        //                "length" => "330 ",
        //                "name" => "مخزن 7000 ليتري افقي دو لايه "),
        //            array(
        //                "Small diameter" => "150 ",
        //                "large diameter" => "220 ",
        //                "length" => "330 ",
        //                "name" => "مخزن 7000 ليتري افقي سه لايه "),
        //            array(
        //                "Small diameter" => "135 ",
        //                "large diameter" => "195 ",
        //                "length" => "310 ",
        //                "name" => "مخزن 6000 ليتري افقي  تک لايه"),
        //            array(
        //                "Small diameter" => "135 ",
        //                "large diameter" => "195 ",
        //                "length" => "310 ",
        //                "name" => "مخزن 6000 ليتري افقي درب پيچي دو لايه "),
        //            array(
        //                "Small diameter" => "135 ",
        //                "large diameter" => "195 ",
        //                "length" => "310 ",
        //                "name" => "مخزن 6000 ليتري افقي درب پيچي سه لايه "),
        //            array(
        //                "Small diameter" => "130 ",
        //                "large diameter" => "190 ",
        //                "length" => "290 ",
        //                "name" => "مخزن 5000 ليتري افقي درب پيچي  تک لايه "),
        //            array(
        //                "Small diameter" => "130 ",
        //                "large diameter" => "190 ",
        //                "length" => "290 ",
        //                "name" => "مخزن 5000 ليتري افقي درب پيچي دو لايه "),
        //            array(
        //                "Small diameter" => "130 ",
        //                "large diameter" => "190 ",
        //                "length" => "290 ",
        //                "name" => "مخزن 5000 ليتري افقي درب پيچي  سه لايه "),
        //            array(
        //                "Small diameter" => "120 ",
        //                "large diameter" => "186 ",
        //                "length" => "265 ",
        //                "name" => "مخزن 4000 ليتري افقي درب پيچي تک لايه "),
        //            array(
        //                "Small diameter" => "120 ",
        //                "large diameter" => "186 ",
        //                "length" => "265 ",
        //                "name" => "مخزن 4000 ليتري افقي درب پيچي سه لايه "),
        //            array(
        //                "Small diameter" => "165 ",
        //                "large diameter" => "155 ",
        //                "length" => "200 ",
        //                "name" => "مخزن 3000 ليتري افقي درب پيچي  يک لايه "),
        //            array(
        //                "Small diameter" => "165 ",
        //                "large diameter" => "155 ",
        //                "length" => "200 ",
        //                "name" => "مخزن 3000 ليتري افقي درب پيچي  دو لايه "),
        //            array(
        //                "Small diameter" => "165 ",
        //                "large diameter" => "155 ",
        //                "length" => "200 ",
        //                "name" => "طرح قدیم'مخزن 3000 ليتري افقي درب پيچي  سه لايه "),
        //            array(
        //                "Small diameter" => "135 ",
        //                "large diameter" => "144 ",
        //                "length" => "215 ",
        //                "name" => "مخزن 2800 لیتری افقی بیضی "),
        //            array(
        //                "Small diameter" => "135 ",
        //                "large diameter" => "144 ",
        //                "length" => "215 ",
        //                "name" => "مخزن 2800 لیتری افقی بیضی 3لایه"),
        //            array(
        //                "Small diameter" => "150 ",
        //                "large diameter" => "140 ",
        //                "length" => "170 ",
        //                "name" => "مخزن 2400 ليتري افقي بوشن دار  تک لايه "),
        //            array(
        //                "Small diameter" => "150 ",
        //                "large diameter" => "140 ",
        //                "length" => "170 ",
        //                "name" => "مخزن 2400 ليتري افقي درب پيچي  دو لايه "),
        //            array(
        //                "Small diameter" => "150 ",
        //                "large diameter" => "140 ",
        //                "length" => "170 ",
        //                "name" => "مخزن 2400 ليتري افقي درب پيچي سه لايه "),
        //            array(
        //                "Small diameter" => "105 ",
        //                "large diameter" => "160 ",
        //                "length" => "210 ",
        //                "name" => "مخزن 2000 ليتري پشت وانتي آبي درب بزرگ"),
        //            array(
        //                "Small diameter" => "105 ",
        //                "large diameter" => "160 ",
        //                "length" => "210 ",
        //                "name" => "مخزن 2000 ليتري پشت وانتي آبي درب کوچک"),
        //            array(
        //                "Small diameter" => "105 ",
        //                "large diameter" => "160 ",
        //                "length" => "210 ",
        //                "name" => "مخزن 2000 ليتري پشت وانتي دوگانه سوز"),
        //            array(
        //                "Small diameter" => "105 ",
        //                "large diameter" => "160 ",
        //                "length" => "210 ",
        //                "name" => "مخزن 2000 ليتري افقي پشت وانتي سفيد"),
        //            array(
        //                "Small diameter" => "105 ",
        //                "large diameter" => "160 ",
        //                "length" => "210 ",
        //                "name" => "مخزن 2000 افقی پشت وانتی طرح جدید"),
        //            array(
        //                "Small diameter" => "105 ",
        //                "large diameter" => "150 ",
        //                "length" => "210 ",
        //                "name" => "مخزن 1800 پشت وانتی "),
        //            array(
        //                "Small diameter" => "110 ",
        //                "large diameter" => "125 ",
        //                "length" => "185 ",
        //                "name" => "مخزن 2000 ليتري افقي  تک لايه "),
        //            array(
        //                "Small diameter" => "110 ",
        //                "large diameter" => "125 ",
        //                "length" => "185 ",
        //                "name" => "مخزن 2000 ليتري افقي دو لايه "),
        //            array(
        //                "Small diameter" => "110 ",
        //                "large diameter" => "125 ",
        //                "length" => "185 ",
        //                "name" => "مخزن 2000 ليتري افقي  سه لايه "),
        //            array(
        //                "Small diameter" => "113 ",
        //                "large diameter" => "115 ",
        //                "length" => "172 ",
        //                "name" => "مخزن 1500 ليتري افقي پشت وانتي"),
        //            array(
        //                "Small diameter" => "113 ",
        //                "large diameter" => "115 ",
        //                "length" => "175 ",
        //                "name" => "مخزن 1500 ليتري افقي درب پيچي  تک لايه "),
        //            array(
        //                "Small diameter" => "113 ",
        //                "large diameter" => "115 ",
        //                "length" => "175 ",
        //                "name" => "مخزن 1500 ليتري افقي درب پيچي  دو لايه "),
        //            array(
        //                "Small diameter" => "113 ",
        //                "large diameter" => "115 ",
        //                "length" => "175 ",
        //                "name" => "مخزن 1500 ليتري افقي درب پيچي سه لايه "),
        //            array(
        //                "Small diameter" => "130 ",
        //                "large diameter" => "110 ",
        //                "length" => "170 ",
        //                "name" => "مخزن 1250 ليتري افقي درب پيچي تک لايه "),
        //            array(
        //                "Small diameter" => "130 ",
        //                "large diameter" => "110 ",
        //                "length" => "170 ",
        //                "name" => "مخزن 1250 ليتري افقي درب پيچي دو لايه "),
        //            array(
        //                "Small diameter" => "130 ",
        //                "large diameter" => "110 ",
        //                "length" => "170 ",
        //                "name" => "مخزن 1250 ليتري افقي درب پيچي  سه لايه "),
        //            array(
        //                "Small diameter" => "98 ",
        //                "large diameter" => "110 ",
        //                "length" => "157 ",
        //                "name" => "مخزن 1000 ليتري افقي بيضي  تک لايه "),
        //            array(
        //                "Small diameter" => "98 ",
        //                "large diameter" => "110 ",
        //                "length" => "157 ",
        //                "name" => "مخزن 1000 ليتري افقي بيضي  دو لايه "),
        //            array(
        //                "Small diameter" => "115 ",
        //                "large diameter" => "115 ",
        //                "length" => "125 ",
        //                "name" => "مخزن 1000 ليتري افقي کمردار سه لایه  "),
        //            array(
        //                "Small diameter" => "115 ",
        //                "large diameter" => "105 ",
        //                "length" => "135 ",
        //                "name" => "مخزن 1000 ليتري افقي تک لايه "),
        //            array(
        //                "Small diameter" => "115 ",
        //                "large diameter" => "105 ",
        //                "length" => "135 ",
        //                "name" => "مخزن 1000 ليتري افقي درب پيچي دو لايه "),
        //            array(
        //                "Small diameter" => "115 ",
        //                "large diameter" => "105 ",
        //                "length" => "135 ",
        //                "name" => "مخزن 1000 ليتري افقي درب پيچي  سه لايه "),
        //            array(
        //                "Small diameter" => "90 ",
        //                "large diameter" => "100 ",
        //                "length" => "128 ",
        //                "name" => "مخزن 900 افقی تک لایه "),
        //            array(
        //                "Small diameter" => " ",
        //                "large diameter" => " ",
        //                "length" => " ",
        //                "name" => "مخزن 900 افقی سه لایه "),
        //            array(
        //                "Small diameter" => "98 ",
        //                "large diameter" => "97 ",
        //                "length" => "160 ",
        //                "name" => "مخزن 850 ليتري افقي درب پيچي تک لايه "),
        //            array(
        //                "Small diameter" => "98 ",
        //                "large diameter" => "97 ",
        //                "length" => "145 ",
        //                "name" => "مخزن 850 ليتري افقي درب پيچي  دو لايه "),
        //            array(
        //                "Small diameter" => "94 ",
        //                "large diameter" => "97 ",
        //                "length" => "145 ",
        //                "name" => "مخزن 850 ليتري افقي درب پيچي سه لايه "),
        //            array(
        //                "Small diameter" => "102 ",
        //                "large diameter" => "108 ",
        //                "length" => "120 ",
        //                "name" => "مخزن 750 ليتري افقي درب پيچي يک لايه "),
        //            array(
        //                "Small diameter" => "102 ",
        //                "large diameter" => "108 ",
        //                "length" => "120 ",
        //                "name" => "مخزن 750 ليتري افقي درب پيچي  دو لايه "),
        //            array(
        //                "Small diameter" => "102 ",
        //                "large diameter" => "108 ",
        //                "length" => "120 ",
        //                "name" => "مخزن 750 ليتري افقي درب پيچي  سه لايه "),
        //            array(
        //                "Small diameter" => "95 ",
        //                "large diameter" => "87 ",
        //                "length" => "117 ",
        //                "name" => "مخزن 500 ليتري افقي درب پيچي  تک لايه "),
        //            array(
        //                "Small diameter" => "95 ",
        //                "large diameter" => "87 ",
        //                "length" => "117 ",
        //                "name" => "مخزن 500 ليتري افقي درب پيچي دو لايه "),
        //            array(
        //                "Small diameter" => "95 ",
        //                "large diameter" => "87 ",
        //                "length" => "117 ",
        //                "name" => "مخزن 500 ليتري افقي درب پيچي  سه لايه "),
        //            array(
        //                "Small diameter" => "78 ",
        //                "large diameter" => "80 ",
        //                "length" => "105 ",
        //                "name" => "مخزن 450 ليتري بيضي"),
        //            array(
        //                "Small diameter" => "78 ",
        //                "large diameter" => "80 ",
        //                "length" => "105 ",
        //                "name" => "مخزن 450 بیضی سه لایه "),
        //            array(
        //                "Small diameter" => "85 ",
        //                "large diameter" => "78 ",
        //                "length" => "95 ",
        //                "name" => "مخزن 300 ليتري افقي درب پيچي يک لايه "),
        //            array(
        //                "Small diameter" => "85 ",
        //                "large diameter" => "78 ",
        //                "length" => "95 ",
        //                "name" => "مخزن 300 ليتري افقي درب پيچي دو لايه "),
        //            array(
        //                "Small diameter" => "85 ",
        //                "large diameter" => "78 ",
        //                "length" => "95 ",
        //                "name" => "مخزن 300 ليتري افقي درب پيچي سه لايه "),
        //            array(
        //                "Small diameter" => "76 ",
        //                "large diameter" => "72 ",
        //                "length" => "90 ",
        //                "name" => "مخزن 220 ليتري افقي درب پيچي يک لايه "),
        //            array(
        //                "Small diameter" => "76 ",
        //                "large diameter" => "72 ",
        //                "length" => "90 ",
        //                "name" => "مخزن 220 ليتري افقي درب پيچي دو لايه "),
        //            array(
        //                "Small diameter" => "76 ",
        //                "large diameter" => "72 ",
        //                "length" => "90 ",
        //                "name" => "مخزن 220 ليتري افقي درب پيچي  سه لايه "),
        //            array(
        //                "Small diameter" => "65 ",
        //                "large diameter" => "55 ",
        //                "length" => "67 ",
        //                "name" => "مخزن 110 ليتري افقي پايه دار")
        //        );

        //        $category = 18;
        //        $arr_18 = array(
        //            array(
        //                "Height" => "220 ",
        //                "length" => "577 ",
        //                "width" => "242 ",
        //                "name" => "مخزن 30000 ليتري مکعبي"),
        //            array(
        //                "Height" => "410 ",
        //                "length" => "300 ",
        //                "width" => "250 ",
        //                "name" => "مخزن 28000 ليتري مکعبي"),
        //            array(
        //                "Height" => "190 ",
        //                "length" => "700 ",
        //                "width" => "130 ",
        //                "name" => "مخزن 17300 ليتري مکعبي"),
        //            array(
        //                "Height" => "107 ",
        //                "length" => "400 ",
        //                "width" => "191 ",
        //                "name" => "مخزن 8000 ليتري مکعبي"),
        //            array(
        //                "Height" => "107 ",
        //                "length" => "400 ",
        //                "width" => "191 ",
        //                "name" => "مخزن 8000 ليتري مکعبي سه لايه"),
        //            array(
        //                "Height" => "190 ",
        //                "length" => "170 ",
        //                "width" => "85 ",
        //                "name" => "مخزن 2000 مکعبی آسان رو دو درب "),
        //            array(
        //                "Height" => " -",
        //                "length" => " -",
        //                "width" => " -",
        //                "name" => "مخزن 1700 مکعبی بلند "),
        //            array(
        //                "Height" => "-",
        //                "length" => "-",
        //                "width" => "-",
        //                "name" => "مخزن 1500 ليتري مکعبي کرکره اي با محافظ و پالت"),
        //            array(
        //                "Height" => "110 ",
        //                "length" => "125 ",
        //                "width" => "120 ",
        //                "name" => "مخزن 1500 لیترمکعبی کرکره ای"),
        //            array(
        //                "Height" => "160 ",
        //                "length" => "120 ",
        //                "width" => "70 ",
        //                "name" => "مخزن 1300 ليتري مكعبي بلند"),
        //            array(
        //                "Height" => " -",
        //                "length" => " -",
        //                "width" => " -",
        //                "name" => "مخزن 1300 ليتري مكعبي سه لایه "),
        //            array(
        //                "Height" => "127 ",
        //                "length" => "130 ",
        //                "width" => "65 ",
        //                "name" => "مخزن 1200 ليتري مكعبي دو قلو تك لايه"),
        //            array(
        //                "Height" => "127 ",
        //                "length" => "130 ",
        //                "width" => "65 ",
        //                "name" => "مخزن 1200 ليتري مكعبي دو قلو دو لايه"),
        //            array(
        //                "Height" => "127 ",
        //                "length" => "130 ",
        //                "width" => "65 ",
        //                "name" => "مخزن 1200 ليتري مكعبي دو قلو سه لايه"),
        //            array(
        //                "Height" => "156 ",
        //                "length" => "140 ",
        //                "width" => "60 ",
        //                "name" => "مخزن 1100 مكعبي 2سوراخه"),
        //            array(
        //                "Height" => "80 ",
        //                "length" => "110 ",
        //                "width" => "110 ",
        //                "name" => "مخزن 1100 مكعبي  سوراخه 2لایه"),
        //            array(
        //                "Height" => "94 ",
        //                "length" => "127 ",
        //                "width" => "110 ",
        //                "name" => "مخزن 1000 لیتری مکعبی كوتاه بامحافظ و پالت"),
        //            array(
        //                "Height" => "80 ",
        //                "length" => "110 ",
        //                "width" => "110 ",
        //                "name" => "مخزن 1000 لیتری مکعبی كوتاه"),
        //            array(
        //                "Height" => "80 ",
        //                "length" => "110 ",
        //                "width" => "110 ",
        //                "name" => "مخزن 1000 لیتری مکعبی دولايه كوتاه"),
        //            array(
        //                "Height" => "50 ",
        //                "length" => "180 ",
        //                "width" => "110 ",
        //                "name" => "مخزن 1000 مكعبي كوتاه جديد"),
        //            array(
        //                "Height" => "80 ",
        //                "length" => "110 ",
        //                "width" => "110 ",
        //                "name" => "مخزن 1000 لیتری مکعبی سه لايه كوتاه"),
        //            array(
        //                "Height" => "130 ",
        //                "length" => "105 ",
        //                "width" => "98 ",
        //                "name" => "مخزن 1000 لیتری مکعبی بلند"),
        //            array(
        //                "Height" => "130 ",
        //                "length" => "105 ",
        //                "width" => "98 ",
        //                "name" => "مخزن 1000 لیتری مکعبی دولايه بلند"),
        //            array(
        //                "Height" => "130 ",
        //                "length" => "105 ",
        //                "width" => "98 ",
        //                "name" => "مخزن 1000 لیتری مکعبی سه لايه بلند"),
        //            array(
        //                "Height" => "118 ",
        //                "length" => "110 ",
        //                "width" => "130 ",
        //                "name" => "مخزن IBC 1000 لیتری با شیر ضد اسید"),
        //            array(
        //                "Height" => "50 ",
        //                "length" => "180 ",
        //                "width" => "100 ",
        //                "name" => "مخزن 1000 لیتری مکعبی کتابی "),
        //            array(
        //                "Height" => "35 ",
        //                "length" => "140 ",
        //                "width" => "100 ",
        //                "name" => "مخزن 500 لیتری مکعبی کتابی "),
        //            array(
        //                "Height" => "35 ",
        //                "length" => "140 ",
        //                "width" => "100 ",
        //                "name" => "مخزن 500 ليتري مکعبي مستطیل دو لایه"),
        //            array(
        //                "Height" => " -",
        //                "length" => " -",
        //                "width" => " -",
        //                "name" => "مخزن 500 ليتري مکعبي مستطیل سه لایه"),
        //            array(
        //                "Height" => "50 ",
        //                "length" => "140 ",
        //                "width" => "60 ",
        //                "name" => "مخزن 420 ليتري مکعبي"),
        //            array(
        //                "Height" => "50 ",
        //                "length" => "140 ",
        //                "width" => "60 ",
        //                "name" => "مخزن 420 ليتري مکعبي دو لایه"),
        //            array(
        //                "Height" => "50 ",
        //                "length" => "120 ",
        //                "width" => "60 ",
        //                "name" => "مخزن 360 ليتري مکعبي"),
        //            array(
        //                "Height" => "50 ",
        //                "length" => "120 ",
        //                "width" => "60 ",
        //                "name" => "مخزن 360 ليتري مکعبي دو لایه"),
        //            array(
        //                "Height" => "90 ",
        //                "length" => "65 ",
        //                "width" => "55 ",
        //                "name" => "مخزن 300 ليتري مکعبي درب ساده"),
        //            array(
        //                "Height" => "90 ",
        //                "length" => "65 ",
        //                "width" => "55 ",
        //                "name" => "مخزن 300 ليتري مکعبي درب پيچي"),
        //            array(
        //                "Height" => "100 ",
        //                "length" => "120 ",
        //                "width" => "50 ",
        //                "name" => "مخزن 500 لیترمکعبی تک لایه آسانرو"),
        //            array(
        //                "Height" => "100 ",
        //                "length" => "120 ",
        //                "width" => "50 ",
        //                "name" => "مخزن 500 لیترمکعبی سه لایه آسانرو"),
        //            array(
        //                "Height" => "85 ",
        //                "length" => "140 ",
        //                "width" => "68 ",
        //                "name" => "مخزن 700 لیترمکعبی تک لایه آسانرو"),
        //            array(
        //                "Height" => "85 ",
        //                "length" => "140 ",
        //                "width" => "68 ",
        //                "name" => "مخزن 700 لیترمکعبی سه لایه آسانرو"),
        //            array(
        //                "Height" => "70 ",
        //                "length" => "200 ",
        //                "width" => "70 ",
        //                "name" => "مخزن 834 لیترمکعبی"),
        //            array(
        //                "Height" => "50 ",
        //                "length" => "46 ",
        //                "width" => "87 ",
        //                "name" => "مخزن 170 لیتری مکعبی خوابیده"),
        //            array(
        //                "Height" => "82 ",
        //                "length" => "39 ",
        //                "width" => "49 ",
        //                "name" => "مخزن 130 لیتری مکعبی ایستاده "),
        //            array(
        //                "Height" => "40 ",
        //                "length" => "41 ",
        //                "width" => "68 ",
        //                "name" => "مخزن 95 لیتری مکعبی خوابیده "),
        //            array(
        //                "Height" => "70 ",
        //                "length" => "49 ",
        //                "width" => "39 ",
        //                "name" => "مخزن 90 لیتری مکعبی ایستاده"),
        //            array(
        //                "Height" => " -",
        //                "length" => " -",
        //                "width" => " -",
        //                "name" => "مخزن کف شور زرد -جفت")
        //        );

        //        $category = 21;
        //        $arr_21 = array(
        //            array(
        //                "length" => 260 ,
        //                "high height" => 90 ,
        //                "Small height" => 55 ,
        //                "name" => "مخزن 1500 لیتری زیرپله تک لایه عرض89 "),
        //            array(
        //                "length" => 165 ,
        //                "high height" => 110 ,
        //                "Small height" => 60 ,
        //                "name" => "مخزن 1200 لیتری زیرپله تک لایه شیاردار عرض 90"),
        //            array(
        //                "length" => 165 ,
        //                "high height" => 110 ,
        //                "Small height" => 60 ,
        //                "name" => "مخزن 1200 لیتری زیرپله 3 لایه شیاردار عرض 90"),
        //            array(
        //                "length" => 140 ,
        //                "high height" => 95 ,
        //                "Small height" => "-",
        //                "name" => "مخزن 1300 ليتري زير پله تک لايه عرض 100"),
        //            array(
        //                "length" => " -",
        //                "high height" => " -",
        //                "Small height" => " -",
        //                "name" => "مخزن 1300 ليتري زير پله دو لايه "),
        //            array(
        //                "length" => " -",
        //                "high height" => " -",
        //                "Small height" => "-",
        //                "name" => "مخزن 1300 لیتری زيرپله سه لايه"),
        //            array(
        //                "length" => 165 ,
        //                "high height" => 100 ,
        //                "Small height" => 50,
        //                "name" => "مخزن 1000 لیتری زیر پله عرض 95"),
        //            array(
        //                "length" => " -",
        //                "high height" => " -",
        //                "Small height" => " -",
        //                "name" => "مخزن 1000 زیر پله سه لایه "),
        //            array(
        //                "length" => 140 ,
        //                "high height" => 95 ,
        //                "Small height" => 45,
        //                "name" => "مخزن 800 لیتری زیر پله شیاردارعرض 85"),
        //            array(
        //                "length" => 125 ,
        //                "high height" => 90 ,
        //                "Small height" => 180,
        //                "name" => "مخزن 800 لیتری زیر پله سه لايه"),
        //            array(
        //                "length" => 145 ,
        //                "high height" => 110 ,
        //                "Small height" => 40,
        //                "name" => "مخزن 850 ليتري زيرپله تك لايه عرض80"),
        //            array(
        //                "length" => " -",
        //                "high height" => " -",
        //                "Small height" => " -",
        //                "name" => "مخزن 850 ليتري زيرپله دو لايه"),
        //            array(
        //                "length" => " -",
        //                "high height" => " -",
        //                "Small height" => " -",
        //                "name" => "مخزن 850 ليتري زيرپله سه لايه"),
        //            array(
        //                "length" => " -",
        //                "high height" => " -",
        //                "Small height" => " -",
        //                "name" => "مخزن 500 زیر پله تک لایه "),
        //            array(
        //                "length" => 130 ,
        //                "high height" => 80 ,
        //                "Small height" => 40,
        //                "name" => "مخزن 500 ليتري زيرپله دو لايه عرض70"),
        //            array(
        //                "length" => " -",
        //                "high height" => " -",
        //                "Small height" => " -",
        //                "name" => "مخزن 500 ليتري زيرپله سه لايه"),
        //            array(
        //                "length" => 100,
        //                "high height" => 90,
        //                "Small height" => 35,
        //                "name" => "مخزن 300 زير پله تك لايه عرض52"),
        //            array(
        //                "length" => " -",
        //                "high height" => " -",
        //                "Small height" => " -",
        //                "name" => "مخزن 300 زير پله سه لايه ")
        //        );
        //        $product_array = $arr_21;

        //        $category = 19;
        //        $arr_19 = array(
        //            array(
        //                "total height" => 790,
        //                "Funnel height" => 100,
        //                "Diameter" => 340,
        //                "name" => "مخزن 66000 ليتري ته قيفي"),
        //            array(
        //                "total height" => 600,
        //                "Funnel height" => 100,
        //                "Diameter" => 340,
        //                "name" => "مخزن 47000 ليتري ته قيفي"),
        //            array(
        //                "total height" => 790,
        //                "Funnel height" => 100,
        //                "Diameter" => 245,
        //                "name" => "مخزن 36000 ليتري ته قيفي"),
        //            array(
        //                "total height" => 630,
        //                "Funnel height" => 100,
        //                "Diameter" => 245,
        //                "name" => "مخزن 26000 ليتري ته قيفي"),
        //            array(
        //                "total height" => 360,
        //                "Funnel height" => 60,
        //                "Diameter" => 220,
        //                "name" => "مخزن 13500 ليتري ته قيفي"),
        //            array(
        //                "total height" => 360,
        //                "Funnel height" => 60,
        //                "Diameter" => 220,
        //                "name" => "مخزن 13500 ته قیفی سه لایه"),
        //            array(
        //                "total height" => 255,
        //                "Funnel height" => 50,
        //                "Diameter" => 245,
        //                "name" => "مخرن8000لیترته قیفی"),
        //            array(
        //                "total height" => 255,
        //                "Funnel height" => 70,
        //                "Diameter" => 190,
        //                "name" => "مخزن 5700 ليتري ته قيفي"),
        //            array(
        //                "total height" => 185,
        //                "Funnel height" => 50,
        //                "Diameter" => 140,
        //                "name" => "مخزن 2000 ليتري ته قيفي"),
        //            array(
        //                "total height" => 185,
        //                "Funnel height" => 50,
        //                "Diameter" => 100,
        //                "name" => "مخزن 1200 ليتري ته قيفي"),
        //            array(
        //                "total height" => 126,
        //                "Funnel height" => 14.5,
        //                "Diameter" => 79,
        //                "name" => "مخزن 500 ليتري ته قيفي"),
        //            array(
        //                "total height" => 177,
        //                "Funnel height" => 75,
        //                "Diameter" => 72,
        //                "name" => "مخزن 450 ليتري زوک"),
        //            array(
        //                "total height" => 145,
        //                "Funnel height" => 73,
        //                "Diameter" => 64,
        //                "name" => "مخزن 300 ليتري زوک"),
        //            array(
        //                "total height" => 102,
        //                "Funnel height" => 40,
        //                "Diameter" => 51,
        //                "name" => "مخزن 100 ليتري زوک"),
        //            array(
        //                "total height" => 70,
        //                "Funnel height" => 20,
        //                "Diameter" => 40,
        //                "name" => "مخزن 50 لیتری زوک"),
        //            array(
        //                "total height" => "-",
        //                "Funnel height" => "-",
        //                "Diameter" => "-",
        //                "name" => "پايه زوک 300 لیتری"),
        //            array(
        //                "total height" => "-",
        //                "Funnel height" => "-",
        //                "Diameter" => "-",
        //                "name" => "پايه زوک 100 لیتری")
        //        );
        //        $product_array = $arr_19;

        //        $category = 20;
        //        $arr_20 = $arr = array(
        //            array(
        //                "Height" => " -",
        //                "Diameter" => " -",
        //                "length" => " -",
        //                "name" => "مخزن 200 ليتري افقي مارال تريلر"),
        //            array(
        //                "Height" => "-",
        //                "Diameter" => " -",
        //                "length" => " -",
        //                "name" => "مخزن 333 ليتري افقي مارال تريلر بلند"),
        //            array(
        //                "Height" => " -",
        //                "Diameter" => " -",
        //                "length" => " -",
        //                "name" => "مخزن 110 ليتري افقي پايه دار"),
        //            array(
        //                "Height" => " -",
        //                "Diameter" => " -",
        //                "length" => " -",
        //                "name" => "مخزن 2000 ليتري سمپاش ( طرح توربوجت )"),
        //            array(
        //                "Height" => 100 ,
        //                "Diameter" => 100 ,
        //                "length" => 210 ,
        //                "name" => "مخزن 1200 ليتري سمپاش"),
        //            array(
        //                "Height" => " -",
        //                "Diameter" => " -",
        //                "length" => " -",
        //                "name" => "مخزن سمپاش 800 ليتري با درب متوسط (كامل)"),
        //            array(
        //                "Height" => " -",
        //                "Diameter" => " -",
        //                "length" => " -",
        //                "name" => "مخزن جانبي سمپاش 800 ليتري "),
        //            array(
        //                "Height" => " -",
        //                "Diameter" => " -",
        //                "length" => "-",
        //                "name" => "درب كوچك مخزن سمپاش 800 ليتري"),
        //            array(
        //                "Height" => " -",
        //                "Diameter" => " -",
        //                "length" => " -",
        //                "name" => "مخزن سمپاش600 لیتر کامل با بوشن"),
        //            array(
        //                "Height" => 70 ,
        //                "Diameter" => 45 ,
        //                "length" => 145 ,
        //                "name" => "مخزن 400 ليتري سمپاش درب ساده حلزوني سفيد"),
        //            array(
        //                "Height" => 90 ,
        //                "Diameter" => 50 ,
        //                "length" => 120 ,
        //                "name" => "مخزن 400 ليتري سمپاش درب پيچي زرد"),
        //            array(
        //                "Height" => " -",
        //                "Diameter" => 60 ,
        //                "length" => 62 ,
        //                "name" => "مخزن 110 ليتري سمپاش درب پيچي"),
        //            array(
        //                "Height" => " -",
        //                "Diameter" => 54 ,
        //                "length" => 62 ,
        //                "name" => "مخزن 110 ليتري سمپاش درب ساده"),
        //            array(
        //                "Height" => 86 ,
        //                "Diameter" => 126 ,
        //                "length" => 116 ,
        //                "name" => "مخزن 1000 لیترسمپاش پشت تراکتور"),
        //            array(
        //                "Height" => " -",
        //                "Diameter" => " -",
        //                "length" => " -",
        //                "name" => "مخزن 2000 لیترسمپاش پشت تراکتور"),
        //            array(
        //                "Height" => " -",
        //                "Diameter" => " -",
        //                "length" => " -",
        //                "name" => "مخزن 2000 سمپاش پشت تراکتوری گرانیتی"),
        //            array(
        //                "Height" => " -",
        //                "Diameter" => " -",
        //                "length" => " -",
        //                "name" => "مخزن 1500 لیتر سمپاش پشت تراکتور "),
        //            array(
        //                "Height" => " -",
        //                "Diameter" => " -",
        //                "length" => " -",
        //                "name" => "مخزن 100 لیترمارال تریلر"),
        //            array(
        //                "Height" => " -",
        //                "Diameter" => " -",
        //                "length" => " -",
        //                "name" => "قطعه جای فن"),
        //            array(
        //                "Height" => " -",
        //                "Diameter" => " -",
        //                "length" => " -",
        //                "name" => "زوک پایه 17سانتی"),
        //            array(
        //                "Height" => " -",
        //                "Diameter" => " -",
        //                "length" => " -",
        //                "name" => "مخزن سمپاش 1200 لیتر تربوجت"),
        //            array(
        //                "Height" => " -",
        //                "Diameter" => " -",
        //                "length" => " -",
        //                "name" => "مخزن سمپاش 100 لیترفرغونی"),
        //            array(
        //                "Height" => " -",
        //                "Diameter" => " -",
        //                "length" => " -",
        //                "name" => "مخزن سمپاش 140 لیتری"),
        //            array(
        //                "Height" => " -",
        //                "Diameter" => " -",
        //                "length" => " -",
        //                "name" => "مخزن سمپاش 220 طرح جدید فرغونی"),
        //            array(
        //                "Height" => 23 ,
        //                "Diameter" => 80 ,
        //                "length" => 116 ,
        //                "name" => "مخزن ذوزنقه مدار با پییچ و مهره")
        //        );
        //        $product_array = $arr_20;
        //

        $category = 16;
        $arr_16 = [
            [
                'height' => '- ',
                'width' => '- ',
                'length' => ' -',
                'name' => 'الاکلنگ خرچنگ'],
            [
                'height' => '- ',
                'width' => '- ',
                'length' => ' -',
                'name' => 'الاکلنگ زرافه'],
            [
                'height' => ' -',
                'width' => '- ',
                'length' => ' -',
                'name' => 'الاكلنگ ماهي'],
            [
                'height' => 110,
                'width' => 400,
                'length' => 400,
                'name' => 'شطرنج پارک'],
            [
                'height' => 110,
                'width' => 400,
                'length' => 400,
                'name' => 'شطرنج پارکی کامل با کف پلی اتیلن'],
            [
                'height' => 190,
                'width' => 60,
                'length' => 315,
                'name' => 'سرسره - پلکان و پايه'],
            [
                'height' => '- ',
                'width' => '- ',
                'length' => '- ',
                'name' => 'سرسره '],
            [
                'height' => 90,
                'width' => 60,
                'length' => 200,
                'name' => 'سرسره طرح نهنگ و فیل'],
            [
                'height' => 160,
                'width' => '- ',
                'length' => ' -',
                'name' => 'سرسره تك نفره'],
            [
                'height' => 160,
                'width' => '- ',
                'length' => '- ',
                'name' => 'سرسره دونفره'],
            [
                'height' => 100,
                'width' => ' -',
                'length' => ' -',
                'name' => 'سرسره دو نفره '],
            [
                'height' => 100,
                'width' => '- ',
                'length' => '- ',
                'name' => 'سرسره تك نفره '],
            [
                'height' => ' -',
                'width' => '- ',
                'length' => ' -',
                'name' => 'رابط حلزوني'],
            [
                'height' => ' -',
                'width' => ' -',
                'length' => ' -',
                'name' => 'رابط سكو'],
            [
                'height' => '- ',
                'width' => '- ',
                'length' => '- ',
                'name' => 'سرسره حلزوني'],
            [
                'height' => ' -',
                'width' => '- ',
                'length' => '- ',
                'name' => 'پاتختي'],
            [
                'height' => '- ',
                'width' => ' -',
                'length' => ' -',
                'name' => 'صندلي تاب با محافظ'],
            [
                'height' => '- ',
                'width' => ' -',
                'length' => '- ',
                'name' => 'ورودي نعل اسبي تك نفره'],
            [
                'height' => ' -',
                'width' => '- ',
                'length' => ' -',
                'name' => 'ورودي نعل اسبي دو نفره'],
            [
                'height' => 55,
                'width' => '- ',
                'length' => '- ',
                'name' => 'لوله روباز سرسره آبي 2 متري'],
            [
                'height' => '- ',
                'width' => 95,
                'length' => 125,
                'name' => 'لوله مستقیم '],
            [
                'height' => ' -',
                'width' => 95,
                'length' => 151,
                'name' => 'لوله سرسره 90 درجه'],
            [
                'height' => '- ',
                'width' => 95,
                'length' => 175,
                'name' => 'لوله سرسره 30 درجه'],
            [
                'height' => 55,
                'width' => 95,
                'length' => 155,
                'name' => 'لوله رو باز 30 درجه'],
            [
                'height' => '- ',
                'width' => '- ',
                'length' => '- ',
                'name' => 'سقف سكوي مجموعه بازي'],
            [
                'height' => ' -',
                'width' => '- ',
                'length' => ' -',
                'name' => 'چهار گوش ورودي'],
            [
                'height' => ' -',
                'width' => '- ',
                'length' => '- ',
                'name' => 'فلنج تونلي'],
            [
                'height' => ' -',
                'width' => 95,
                'length' => 115,
                'name' => 'ورودي آب'],
            [
                'height' => ' -',
                'width' => 95,
                'length' => 115,
                'name' => 'خروجی تونلي'],
            [
                'height' => ' -',
                'width' => ' -',
                'length' => '- ',
                'name' => 'سه راهي'],
            [
                'height' => '- ',
                'width' => '- ',
                'length' => '- ',
                'name' => 'تونل نردبان'],
            [
                'height' => ' -',
                'width' => '- ',
                'length' => ' -',
                'name' => 'قارچ'],
            [
                'height' => ' -',
                'width' => '- ',
                'length' => ' -',
                'name' => 'کفي سکو'],
            [
                'height' => ' -',
                'width' => '- ',
                'length' => '- ',
                'name' => 'بست فلزي'],
            [
                'height' => '- ',
                'width' => '- ',
                'length' => '- ',
                'name' => 'بست پلیمری '],
            [
                'height' => ' -',
                'width' => '- ',
                'length' => ' -',
                'name' => 'پيم پليمري'],
            [
                'height' => '- ',
                'width' => '- ',
                'length' => '- ',
                'name' => 'طوري منحني'],
            [
                'height' => 160,
                'width' => ' -',
                'length' => ' -',
                'name' => 'راه پله'],
            [
                'height' => 100,
                'width' => '- ',
                'length' => ' -',
                'name' => 'راه پله'],
            [
                'height' => '- ',
                'width' => ' -',
                'length' => ' -',
                'name' => 'پنل شیروانی '],
            [
                'height' => 120,
                'width' => 5,
                'length' => 95,
                'name' => 'پنل محافظ شبكه اي'],
            [
                'height' => 120,
                'width' => 5,
                'length' => 95,
                'name' => 'پنل محافظ خورشيدي'],
            [
                'height' => '- ',
                'width' => ' -',
                'length' => '- ',
                'name' => 'پنل محافظ طرح ملوان'],
            [
                'height' => '- ',
                'width' => '- ',
                'length' => ' -',
                'name' => 'پنل ورودي چشم دار'],
            [
                'height' => ' -',
                'width' => '- ',
                'length' => ' -',
                'name' => 'پنل راه پله '],
            [
                'height' => ' -',
                'width' => '- ',
                'length' => ' -',
                'name' => 'پنل تاج'],
            [
                'height' => ' -',
                'width' => '- ',
                'length' => '- ',
                'name' => 'ديواره مشبک '],
            [
                'height' => ' -',
                'width' => '- ',
                'length' => '-',
                'name' => 'ديواره محافظ'],
            [
                'height' => ' -',
                'width' => '- ',
                'length' => '- ',
                'name' => 'كاور تونلي'],
            [
                'height' => 95,
                'width' => '- ',
                'length' => 'قطر 295cm',
                'name' => 'سقف آلاچیق-بزرگ'],
            [
                'height' => '- ',
                'width' => '- ',
                'length' => 'قطر 205cm',
                'name' => 'سقف آلاچیق-كوچك'],
            [
                'height' => '- ',
                'width' => '- ',
                'length' => '- ',
                'name' => 'سقف هلالی'],
            [
                'height' => ' -',
                'width' => '- ',
                'length' => '- ',
                'name' => 'كاور ستون 90 درجه '],
            [
                'height' => '- ',
                'width' => '- ',
                'length' => '- ',
                'name' => 'كاور ستون 180 درجه'],
            [
                'height' => '- ',
                'width' => ' -',
                'length' => '- ',
                'name' => 'پنل ابري چشم دار سقف'],
            [
                'height' => ' -',
                'width' => ' -',
                'length' => '- ',
                'name' => 'کلاهک آلاچیق کوچک'],
            [
                'height' => ' -',
                'width' => '- ',
                'length' => '- ',
                'name' => 'کلاهک آلاچیق بزرگ'],
            [
                'height' => ' -',
                'width' => '- ',
                'length' => '- ',
                'name' => 'کرم هزارپا'],
            [
                'height' => 130,
                'width' => 80,
                'length' => 200,
                'name' => 'میز گیمینگ'],
            [
                'height' => 26,
                'width' => 83,
                'length' => 128,
                'name' => 'قایق کودک'],
        ];
        $product_array = $arr_16;

        $created = Carbon::now()->subHour();
        foreach (array_reverse($product_array, $preserve_keys = false) as $product) {

            $oldPath = public_path('assets/default').'/'.$category.'.jpg'; // publc/images/1.jpg

            $fileExtension = File::extension($oldPath);

            $fileName = rand(0, 999).'-'.time().'.'.$fileExtension;
            $newPathWithName = 'uploads/product/'.$fileName;
            File::copy($oldPath, $newPathWithName);

            $product['name'] = str_replace('ي', 'ی', $product['name']);

            $created = $created->addSecond();
            $Product = Product::create([
                'language_id' => 1,
                'category_id' => $category,
                'title' => $product['name'],
                'description' => $product['name'],
                'seo_title' => $product['name'],
                'seo_description' => $product['name'],
                'image' => $newPathWithName,
                'banner' => $newPathWithName,
                'status' => 1,
                'created_at' => $created->toDateTimeString(),
                'updated_at' => $created->toDateTimeString(),
            ]);

            $Product_table_list = [
                [0 => ['item' => 'نام محصول'], ['item' => 'طول'], ['item' => 'عرض'], ['item' => 'ارتفاع']],
                [1 => ['item' => $product['name']], ['item' => $product['length']], ['item' => $product['width']], ['item' => $product['height']]],
            ];

            $created2 = Carbon::now()->subHour();
            foreach ($Product_table_list as $item) {
                $created2 = $created2->addSecond();
                Product_table_list::create([
                    'product_id' => $Product->id,
                    'items' => $item,
                    'created_at' => $created2->toDateTimeString(),
                    'updated_at' => $created2->toDateTimeString(),

                ]);

            }

        }

        dd('finish');
    }
}
