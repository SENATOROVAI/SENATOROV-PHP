<?php
//youtube.com/SENATOROV

$input = 'data.xml';     //XML файл или URL
$output_path = '';   //директория сохранения CSV файла, если ничего не указано - корень.
//создаем в переменной $parse объект по классу XmlToCsv. Т.е. В $parse хранится вся инстукция(значения) класса XmlToCsv
$parse = new XmlToCsv;
$fields = $parse->parsing($input); //кладём в переменную-массив файл xml
$csv = $parse->generate_csv($fields, $output_path); //присваиваем переменной созданный csv файл
//создаем класс, для создания общей инструкции
class XmlToCsv {
    //объявляем глобальную область видимости для функции
    public function parsing($xml_source) {


        //заголовок csv

        //          asin - для сопоставления ключей входного и выходного массива. ASIN - название столбца.
        $fields[0]['asin'] = 'ASIN';
        $fields[0]['url'] = 'URL';
        $fields[0]['amzn_url'] = 'Amazon Url';
        $fields[0]['pr_name'] = 'Product Name';
        $fields[0]['pr_summary'] = 'Amazon Product Summary';
        $fields[0]['pr_summary_count'] = 'Amazon Product Summary COUNT';
        $fields[0]['award'] = 'Amazon Award';
        $fields[0]['award_count'] = 'Amazon Award COUNT';
        //создаем объект SimpleXMLElement который работает по инструкции(модели) XmlToCsv, передаём в него аргумент функции
        $xml = new SimpleXMLElement($xml_source, null, true);
        //объявляем интерацию с "1" для перехода к след. элем.
        $n = 1;
        //создаем цикл для перебора элементов

        //первый форич для ссылки(верхний уровень), второй опирается на него и нужен для его дочек(нижний уровень,основные данные таблицы)
        foreach ($xml->channel->item as $item) {
            $link_str = (string)$item->link; //(string) - задаём жёстко строковый тип данных
            foreach ($item->children('amzn', true)->products->children('amzn', true)->product as $amzn_product) { //amzn - тег в xml, true - его наличие
                $url_temp = explode('/', $amzn_product->children('amzn', true)->productURL); //explode — Разбивает строку с помощью разделителя
                $asin = (string)$url_temp[4];//парсим последнее значение из ссылки(https://amazon.com/dp/B07117PVS8/) где https:// - имеет нулевой индекс,B07117PVS8 - 4 индекс.
                $url = (string)$amzn_product->children('amzn', true)->productURL;
                $pr_name = (string)$amzn_product->children('amzn', true);
                $pr_summary = (string)$amzn_product->children('amzn', true)->productSummary;
                $award = (string)$amzn_product->children('amzn', true)->award;


                //запись в csv
                //          asin - для сопоставления ключей входного и выходного массива. $asin - переменная в цикле форич.
                $fields[$n]['asin'] = $asin;
                $fields[$n]['url'] = $link_str;
                $fields[$n]['amzn_url'] = $url;
                $fields[$n]['pr_name'] = $pr_name;
                $fields[$n]['pr_summary'] = $pr_summary;
                $fields[$n]['pr_summary_count'] = mb_strlen($pr_summary);//mb_strlen — Получает длину строки
                $fields[$n]['award'] = $award;
                $fields[$n]['award_count'] = mb_strlen($award);
                $n++; //переход к следующему элименту.
            }

        }

        return $fields;

    }

    function generate_csv($data, $output) {

        //$date = date("Y-m-d"); если требуется дата в имени
        $path = 'Ruslan.csv';     //имя файла // генератор имени - $output . $_SERVER['SERVER_NAME'] . '_' . $date . ' .csv';

        $csv = fopen($path, 'w');


        foreach ($data as $field) {
            fputcsv($csv, $field, ';');   //конвертирование файла
        }

        fclose($csv);

        return $csv;
    }
}



if ($csv == true) {
    echo '  <style>
    body {
      background: #111;
      color: white;
      height: 100vh;
    }
    .senatorov {
      display:flex;
      justify-content:center;
      font-size:30px;
      color:red;
      position:static;
    }
    .senator {
      display: flex;
      font-size: 40px;
      justify-content: center;
      font-weight: normal;
      align-items: center;
      color: #777 !important;
    }
  </style>
<div class="senatorov">CSV - СОЗДАН.</div>
<div class="senator">youtube.com/SENATOROV</div>';
} else {
    echo '  <style>
    body {
      background: #111;
      color: white;
    }
    .senatorov {
      display:flex;
      justify-content:center;
      font-size:30px;
      color:red;
      position:static;
    }
    .senator {
      display: flex;
      font-size: 40px;
      justify-content: center;
      font-weight: normal;
      align-items: center;
      height: 100vh;
      color: #777 !important;
    }
  </style>
<div class="senatorov">Ошибка! CSV - НЕ СОЗДАН.</div>
<div class="senator">youtube.com/SENATOROV</div>';
}

?>
