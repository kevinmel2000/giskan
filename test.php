
      <?php

      //Load data auto gempa

      $list_warning= new SimpleXMLElement('http://data.bmkg.go.id/Maritim_Tinggi_Gelombang_12jam.xml',null,true);
      foreach ($list_warning->data->Gelombang->DataGelombang as $row) {


         // echo $row->Wilayah->Count();
         // echo $row->Wilayah->Wil[0];
      }

      $data=$list_warning->data->Gelombang->DataGelombang->Wilayah;
      $gelombang=$list_warning->data->Gelombang->DataGelombang;
      // echo $data->Wil->count();
      $total= $data->Wil->count();
      $total_gelombang=$gelombang->count();
      // echo $total_gelombang;

      $i=0;
      while ($i<$total)
      {
        echo $data->Wil[$i]."<br/>";
        $i++;
      }
?>
