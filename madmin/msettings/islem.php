<?php 

ob_start();
session_start();
include 'baglan.php';
include '../production/fonksiyon.php';

error_reporting(E_ALL & ~E_NOTICE);


if (isset($_POST['menuduzenle'])) {

	if($_FILES['menu_resimyol']['size']>0)  { 


	$uploads_dir = '../../uploads';
	 @$tmp_name = $_FILES['menu_resimyol']["tmp_name"];
	 @$name = $_FILES['menu_resimyol']["name"];
	//resmin isminin benzersiz olması
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);	
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	 $refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");


		$duzenle=$db->prepare("UPDATE menu SET
			menu_ad=:menu_ad,
			menu_sira=:menu_sira,
			menu_durum=:menu_durum,
			menu_resimyol=:menu_resimyol

			WHERE menu_id={$_POST['menu_id']}");
		$update=$duzenle->execute(array(
			'menu_ad' => $_POST['menu_ad'],
			'menu_sira' => $_POST['menu_sira'],
			'menu_durum' => $_POST['menu_durum'],
			'menu_resimyol' => $refimgyol
			));
		

		$menu_id=$_POST['menu_id'];

		if ($update) {


			Header("Location:../production/menu.php?slider_id=$menu_id&durum=ok");

		} else {

			Header("Location:../production/menu.php?durum=no");
		}



	} else {

		$duzenle=$db->prepare("UPDATE menu SET
			
			menu_ad=:menu_ad,
			menu_sira=:menu_sira,
			menu_durum=:menu_durum,
			menu_resimyol=:menu_resimyol
			

			WHERE menu_id={$_POST['menu_id']}");
		
			$update=$duzenle->execute(array(
			'menu_ad' => $_POST['menu_ad'],
			'menu_sira' => $_POST['menu_sira'],
			'menu_durum' => $_POST['menu_durum'],
			'menu_resimyol'=> $_POST['menu_resimyol']
			));

		$menu_id=$_POST['menu_id'];

		if ($update) {

			Header("Location:../production/menu.php?menu_id=$menu_id&durum=ok");

		} else {

			Header("Location:../production/menu.php?durum=no");
		}
	

}
}



if ($_GET['menusil']=="ok") {

	$sil=$db->prepare("DELETE from menu where menu_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['menu_id']
		));


	if ($kontrol) {


		header("location:../production/menu.php?sil=ok");


	} else {

		header("location:../production/menu.php?sil=no");

	}


}


if (isset($_POST['menukaydet'])) {

	$uploads_dir = '../../uploads';
	 @$tmp_name = $_FILES['menu_resimyol']["tmp_name"];
	 @$name = $_FILES['menu_resimyol']["name"];
	//resmin isminin benzersiz olması
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);	
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	 $refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");




	$ayarekle=$db->prepare("INSERT INTO menu SET
		menu_ad=:menu_ad,
		menu_resimyol=:menu_resimyol,
		menu_sira=:menu_sira,
		menu_durum=:menu_durum

		");

	$insert=$ayarekle->execute(array(

		'menu_ad' => $_POST['menu_ad'],
		'menu_resimyol' =>$refimgyol,
		'menu_sira' => $_POST['menu_sira'],
		'menu_durum' => $_POST['menu_durum']

		));


	if ($insert) {

		Header("Location:../production/menu.php?ekle=ok");

	} else {

		Header("Location:../production/menu.php?ekle=no");
	}

}
# ürün işlem başlangıç ####################################################

if ($_GET['urunsil']=="ok") {
	
	$sil=$db->prepare("DELETE from urunler where urun_id=:urun_id");
	$kontrol=$sil->execute(array(
		'urun_id' => $_GET['urun_id']
		));

	if ($kontrol) {

		Header("Location:../production/urun.php?durum=ok");

	} else {

		Header("Location:../production/urun.php?durum=no");
	}

}



if (isset($_POST['urunkaydet'])) {

	$uploads_dir = '../../images/urunResim';
	 @$tmp_name = $_FILES['urun_resimyol']["tmp_name"];
	 @$name = $_FILES['urun_resimyol']["name"];
	//resmin isminin benzersiz olması
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);	
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	 $refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");


	

	$kaydet=$db->prepare("INSERT INTO urunler SET
		
		urun_ad=:urun_ad,
		urun_fiyat=:urun_fiyat,
		urun_durum=:urun_durum,
		urun_resimyol=:urun_resimyol,
		urun_icerik=:urun_icerik,
		urun_sira=:urun_sira
		");
	$insert=$kaydet->execute(array(
		
		'urun_ad' => $_POST['urun_ad'],
		'urun_fiyat' => $_POST['urun_fiyat'],
		'urun_durum' => $_POST['urun_durum'],
		'urun_resimyol'=> $refimgyol,
		'urun_icerik' => $_POST['urun_icerik'],
		'urun_sira' => $_POST['urun_sira']

		));

	if ($insert) {

		Header("Location:../production/urun.php?durum=ok");

	} else {

		Header("Location:../production/urun.php?durum=no");
	}

}

if (isset($_POST['urunduzenle'])) {


	if($_FILES['urun_resimyol']['size'] > 0)  { 


		$uploads_dir = '../../images/urunResim';
	 @$tmp_name = $_FILES['urun_resimyol']["tmp_name"];
	 @$name = $_FILES['urun_resimyol']["name"];
	//resmin isminin benzersiz olması
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);	
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	 $refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");


	$kaydet=$db->prepare("UPDATE urunler SET
	
		urun_ad=:urun_ad,
		urun_fiyat=:urun_fiyat,
		urun_durum=:urun_durum,
		urun_resimyol=:urun_resimyol,
		urun_icerik=:urun_icerik,
		urun_sira=:urun_sira
		WHERE urun_id={$_POST['urun_id']}");
	$update=$kaydet->execute(array(


		'urun_ad' => $_POST['urun_ad'],
		'urun_fiyat' => $_POST['urun_fiyat'],
		'urun_durum' => $_POST['urun_durum'],
		'urun_resimyol'=> $refimgyol,
		'urun_icerik' => $_POST['urun_icerik'],
		'urun_sira' => $_POST['urun_sira']
		));

	if ($update) {

		Header("Location:../production/urun.php?urunguncel=ok&urun_id=$urun_id");

	} else{

		Header("Location:../production/urun-duzenle.php?urunguncel=no&urun_id=$urun_id");
	}


	}else {

		$duzenle=$db->prepare("UPDATE urunler SET
			urun_ad=:urun_ad,
			urun_fiyat=:urun_fiyat,
			urun_durum=:urun_durum,
			urun_resimyol=:urun_resimyol,
			urun_icerik=:urun_icerik,
			urun_sira=:urun_sira	
			
			WHERE urun_id={$_POST['urun_id']}");
		$update=$duzenle->execute(array(
			
			'urun_ad' => $_POST['urun_ad'],
			'urun_fiyat' => $_POST['urun_fiyat'],
			'urun_durum' => $_POST['urun_durum'],
			'urun_resimyol'=> $_POST['urun_resimyol'],
			'urun_icerik' => $_POST['urun_icerik'],
			'urun_sira' => $_POST['urun_sira']
			));

		$urun_id=$_POST['urun_id'];

		if ($update) {

			Header("Location:../production/urun.php?urun_id=$urun_id&durum=ok");

		} else {

			Header("Location:../production/urun-duzenle.php?durum=no");
		}
	

}
}

if(isset($_POST['urunfotosil'])) {

	$urun_id=$_POST['urun_id'];


	echo $checklist = $_POST['urunfotosec'];

	
	foreach($checklist as $list) {

		$sil=$db->prepare("DELETE from urunfoto where urunfoto_id=:urunfoto_id");
		$kontrol=$sil->execute(array(
			'urunfoto_id' => $list
			));
	}

	if ($kontrol) {

		Header("Location:../production/urun-galeri.php?urun_id=$urun_id&durum=ok");

	} else {

		Header("Location:../production/urun-galeri.php?urun_id=$urun_id&durum=no");
	}


} 
if ($_GET['urun_onecikar']=="ok") {

												

												
												$duzenle=$db->prepare("UPDATE urun SET
													
													urun_onecikar=:urun_onecikar
													
													WHERE urun_id={$_GET['urun_id']}");
												
												$update=$duzenle->execute(array(


													'urun_onecikar' => $_GET['urun_one']
													));



												if ($update) {

													

													Header("Location:../production/urun.php?durum=ok");

												} else {

													Header("Location:../production/urun.php?durum=no");
												}

											}



#ürün işlem bitiş  ##############################################################
if (isset($_POST['admingiris']))
 {


 	$kullanici_ad= $_POST['kullanici_ad'];
 	$kullanici_sifre= $_POST['kullanici_sifre'];

 	$kullanicisor=$db->prepare("SELECT * FROM admin WHERE kullanici_ad=:ad and sifre=:password ");
$kullanicisor->execute(array(
 
  'ad' => $kullanici_ad,
  'password' =>$kullanici_sifre
));

echo  $say=$kullanicisor->rowCount();
if ($say==1)
{
	$_SESSION['kullanici_ad']=$kullanici_ad;
	header("Location:../production/index.php");
}
else
{
	header("Location:../production/login.php?durum=no");
	exit;
}
}
# slider işlemleri başlangıç
#slider ekle








if (isset($_POST['sliderkaydet'])) {

	$uploads_dir = '../../images/sliderResim';
	 @$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
	 @$name = $_FILES['slider_resimyol']["name"];
	//resmin isminin benzersiz olması
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);	
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	 $refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

	


	$kaydet=$db->prepare("INSERT INTO slider SET
		slider_ad=:slider_ad,
		slider_sira=:slider_sira,
		slider_durum=:slider_durum,
		slider_resimyol=:slider_resimyol
		");
	$insert=$kaydet->execute(array(
		'slider_ad' => $_POST['slider_ad'],
		'slider_sira' => $_POST['slider_sira'],
		'slider_durum' => $_POST['slider_durum'],
		'slider_resimyol' => $refimgyol
		));

	if ($insert) {

		Header("Location:../production/slider.php?durum=ok");

	} else {

		Header("Location:../production/slider.php?durum=no");
	}
}
#slider ekle(orta)





// Slider Düzenleme Başla


if (isset($_POST['sliderduzenle'])) {

	
	if($_FILES['slider_resimyol']['size']>0)  { 


	$uploads_dir = '../../images/sliderResim';
	 @$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
	 @$name = $_FILES['slider_resimyol']["name"];
	//resmin isminin benzersiz olması
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);	
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	 $refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");


		$duzenle=$db->prepare("UPDATE slider SET
			slider_ad=:slider_ad,
			slider_sira=:slider_sira,
			slider_durum=:slider_durum,
			slider_resimyol=:slider_resimyol

			WHERE slider_id={$_POST['slider_id']}");
		$update=$duzenle->execute(array(
			'slider_ad' => $_POST['slider_ad'],
			'slider_sira' => $_POST['slider_sira'],
			'slider_durum' => $_POST['slider_durum'],
			'slider_resimyol' => $refimgyol
			));
		

		$slider_id=$_POST['slider_id'];

		if ($update) {


			Header("Location:../production/slider.php?slider_id=$slider_id&durum=ok");

		} else {

			Header("Location:../production/slider-duzenle.php?durum=no");
		}



	} else {

		$duzenle=$db->prepare("UPDATE slider SET
			
			slider_ad=:slider_ad,
			slider_sira=:slider_sira,
			slider_durum=:slider_durum,
			slider_resimyol=:slider_resimyol
			

			WHERE slider_id={$_POST['slider_id']}");
		
			$update=$duzenle->execute(array(
			'slider_ad' => $_POST['slider_ad'],
			'slider_sira' => $_POST['slider_sira'],
			'slider_durum' => $_POST['slider_durum'],
			'slider_resimyol'=> $_POST['slider_resimyol']
			));

		$slider_id=$_POST['slider_id'];

		if ($update) {

			Header("Location:../production/slider-duzenle.php?slider_id=$slider_id&durum=ok");

		} else {

			Header("Location:../production/slider.php?durum=no");
		}
	

}// Slider Düzenleme Bitiş
}


if ($_GET['slidersil']=="ok") {
	
	$sil=$db->prepare("DELETE from slider where slider_id=:slider_id");
	$kontrol=$sil->execute(array(
		'slider_id' => $_GET['slider_id']
		));

	if ($kontrol) {

		$resimsilunlink=$_GET['slider_resimyol'];
		unlink("../../$resimsilunlink");

		Header("Location:../production/slider.php?durum=ok");

	} else {

		Header("Location:../production/slider.php?durum=no");
	}

}

//slider orta silme

# silder işlemleri bitiş ###############################################################

# kategor işlemleri başlangıç ###############################################################




#Site Ayarları Başlangıç ############################


if (isset($_POST['genelayarkaydet'])) {

	$ayarkaydet=$db->prepare
	("UPDATE genel_ayar SET

		ayar_title=:ayar_title,
		ayar_description=:ayar_description,
		ayar_keywords=:ayar_keywords,
		ayar_author=:ayar_author
		WHERE site_id=1

	");

	$update=$ayarkaydet->execute(array
		(
			'ayar_title' => $_POST['ayar_title'],
			'ayar_description'=> $_POST['ayar_description'],
			'ayar_keywords'=> $_POST['ayar_keywords'],
			'ayar_author'=> $_POST['ayar_author']
		)	
	);

	if($update)
	{	
		header("Location:../production/genel-ayar.php?genelayar=ok");
	}
	else
	{
		header("Location: ../production/genel-ayar.php?genelayar=no");

	}
	
}

if (isset($_POST['iletisimkaydet'])) {

	$ayarkaydet=$db->prepare
	("UPDATE iletisim SET

		iletisim_telefon=:iletisim_telefon,
		iletisim_telefon2=:iletisim_telefon2,
		iletisim_adres=:iletisim_adres,
		iletisim_mesai=:iletisim_mesai

		WHERE iletisim_id=1

	");

	$update=$ayarkaydet->execute(array
		(
			'iletisim_telefon' => $_POST['iletisim_telefon'],
			'iletisim_telefon2'=> $_POST['iletisim_telefon2'],
			'iletisim_adres'=> $_POST['iletisim_adres'],
			'iletisim_mesai'=> $_POST['iletisim_mesai']
		)	
	);

	if($update)
	{	
		header("Location:../production/iletisim-ayar.php?iletisimayar=ok");
	}
	else
	{
		header("Location: ../production/iletisim-ayar.php?iletisimayar=no");

	}
	
}









?>