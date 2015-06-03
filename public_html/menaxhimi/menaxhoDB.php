<?php
require_once("../../resources/config.php");

require library."/databaza.php";
$header_titulli = "Menaxho databazen";
$css_includes = Array("../css/dashboard.css", "../css/form.css");
require(dashboard_header);

if (isset($_POST['createDB']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    $db = new db_manager;
    $rez = $db->create_db();
	echo $rez;
}

if (isset($_POST['dropDB']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    $db = new db_manager;
    $rez = $db->drop_db();
	echo $rez;
}

if (isset($_POST['createUser']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    $db = new db_manager;
    $rez = $db->create_table_User();
	$salt1 = "2%a@*/";
    $salt2 = "&9o?>";
	$passi = "admin";
    $pass = sha1("$salt1$passi$salt2");
    $db->execute("Insert into user(Username,Password,Emri,Mbiemri,Prioriteti) Values (%s,%s,%s,%s,%s)", "admin", $pass, "Admin", "Admin", "Admin");
	echo $rez;
}

if (isset($_POST['dropUser']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    $db = new db_manager;
    $rez = $db->drop_table_User();
	echo $rez;
}

if (isset($_POST['createUdhetimetBus']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    $db = new db_manager;
    $rez = $db->create_table_UdhetimetBus();
	echo $rez;
}

if (isset($_POST['dropUdhetimetBus']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    $db = new db_manager;
    $rez = $db->drop_table_UdhetimetBus();
	echo $rez;
}

if (isset($_POST['createUdhetimetAeroplan']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    $db = new db_manager;
    $rez = $db->create_table_UdhetimetAeroplan();
	echo $rez;
}

if (isset($_POST['dropUdhetimetAeroplan']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    $db = new db_manager;
    $rez = $db->drop_table_UdhetimetAeroplan();
	echo $rez;
}

if (isset($_POST['createLokacionet']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    $db = new db_manager;
    $rez = $db->create_table_Lokacione();
	echo $rez;
}

if (isset($_POST['dropLokacionet']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    $db = new db_manager;
    $rez = $db->drop_table_Lokacione();
	echo $rez;
}

if (isset($_POST['createRezervoBus']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    $db = new db_manager;
    $rez = $db->create_table_RezervoBus();
	echo $rez;
}

if (isset($_POST['dropRezervoBus']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    $db = new db_manager;
    $rez = $db->drop_table_RezervoBus();
	echo $rez;
}

if (isset($_POST['createRezervoAeroplan']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    $db = new db_manager;
    $rez = $db->create_table_RezervoAeroplan();
	echo $rez;
}

if (isset($_POST['dropRezervoAeroplan']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    $db = new db_manager;
    $rez = $db->drop_table_RezervoAeroplan();
	echo $rez;
}

if (isset($_POST['createForumi']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    $db = new db_manager;
    $rez = $db->create_table_Forumi();
	echo $rez;
}

if (isset($_POST['dropForumi']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    $db = new db_manager;
    $rez = $db->drop_table_Forumi();
	echo $rez;
}

if (isset($_POST['createGaleria']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    $db = new db_manager;
    $rez = $db->create_table_Galeria();
	echo $rez;
}

if (isset($_POST['dropGaleria']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    $db = new db_manager;
    $rez = $db->drop_table_Galeria();
	echo $rez;
}

function mbush_te_dhena() {
    $db = new repository();
    
    //lokacionet bus jo reklam
    $db->execute("Insert Into lokacione(Vendi, Pershkrimi, Foto, Reklam, Mjeti) values ('Prishtine','', '', 0, 'Bus')");
    $db->execute("Insert Into lokacione(Vendi, Pershkrimi, Foto, Reklam, Mjeti) values ('Prizren','', '', 0, 'Bus')");
    $db->execute("Insert Into lokacione(Vendi, Pershkrimi, Foto, Reklam, Mjeti) values ('Peje','', '', 0, 'Bus')");
    $db->execute("Insert Into lokacione(Vendi, Pershkrimi, Foto, Reklam, Mjeti) values ('Mitrovice','', '', 0, 'Bus')");
    $db->execute("Insert Into lokacione(Vendi, Pershkrimi, Foto, Reklam, Mjeti) values ('Gjilan','', '', 0, 'Bus')");
    $db->execute("Insert Into lokacione(Vendi, Pershkrimi, Foto, Reklam, Mjeti) values ('Gjakove','', '', 0, 'Bus')");
    $db->execute("Insert Into lokacione(Vendi, Pershkrimi, Foto, Reklam, Mjeti) values ('Ferizaj','', '', 0, 'Bus')");
    
    //lokacionet aeroplan jo reklam
    $db->execute("Insert Into lokacione(Vendi, Pershkrimi, Foto, Reklam, Mjeti) values ('Prishtine','', '', 0, 'Aeroplan')");
    $db->execute("Insert Into lokacione(Vendi, Pershkrimi, Foto, Reklam, Mjeti) values ('Tirane','', '', 0, 'Aeroplan')");
    $db->execute("Insert Into lokacione(Vendi, Pershkrimi, Foto, Reklam, Mjeti) values ('Paris','', '', 0, 'Aeroplan')");
    $db->execute("Insert Into lokacione(Vendi, Pershkrimi, Foto, Reklam, Mjeti) values ('Berlin','', '', 0, 'Aeroplan')");
    $db->execute("Insert Into lokacione(Vendi, Pershkrimi, Foto, Reklam, Mjeti) values ('Londer','', '', 0, 'Aeroplan')");
    $db->execute("Insert Into lokacione(Vendi, Pershkrimi, Foto, Reklam, Mjeti) values ('New York','', '', 0, 'Aeroplan')");
    $db->execute("Insert Into lokacione(Vendi, Pershkrimi, Foto, Reklam, Mjeti) values ('Viene','', '', 0, 'Aeroplan')");
    $db->execute("Insert Into lokacione(Vendi, Pershkrimi, Foto, Reklam, Mjeti) values ('Madrid','', '', 0, 'Aeroplan')");
    $db->execute("Insert Into lokacione(Vendi, Pershkrimi, Foto, Reklam, Mjeti) values ('Rome','', '', 0, 'Aeroplan')");
    
    //udhetime bus
    $db->execute("Insert into udhetimetbus(Prej, Deri, Ulese, Data, Cmimi) Values ('Prishtine','Prizren',50,'2015-06-18 16:08:00',4)");
    $db->execute("Insert into udhetimetbus(Prej, Deri, Ulese, Data, Cmimi) Values ('Prishtine','Peje',50,'2015-06-25 10:00:00',5)");
    $db->execute("Insert into udhetimetbus(Prej, Deri, Ulese, Data, Cmimi) Values ('Prishtine','Mitrovice',30,'2015-06-20 15:30:00',2)");
    $db->execute("Insert into udhetimetbus(Prej, Deri, Ulese, Data, Cmimi) Values ('Peje','Prizren',40,'2015-06-22 11:00:00',4)");
    $db->execute("Insert into udhetimetbus(Prej, Deri, Ulese, Data, Cmimi) Values ('Mitrovice','Ferizaj',30,'2015-06-24 08:50:00',3)");
    $db->execute("Insert into udhetimetbus(Prej, Deri, Ulese, Data, Cmimi) Values ('Peje','Gjilan',50,'2015-06-25 17:00:00',4)");
    $db->execute("Insert into udhetimetbus(Prej, Deri, Ulese, Data, Cmimi) Values ('Prizren','Gjakove',40,'2015-06-30 20:00:00',3)");
    
    //udhetime aeroplan
    $db->execute("Insert into udhetimetaeroplan(Prej, Deri, Ulese, Data, Cmimi) Values ('Prishtine','Paris',180,'2015-06-15 20:00:00',189)");
    $db->execute("Insert into udhetimetaeroplan(Prej, Deri, Ulese, Data, Cmimi) Values ('Prishtine','New York',220,'2015-06-18 06:00:00',720)");
    $db->execute("Insert into udhetimetaeroplan(Prej, Deri, Ulese, Data, Cmimi) Values ('Londer','Prishtine',180,'2015-06-20 10:00:00',270)");
    $db->execute("Insert into udhetimetaeroplan(Prej, Deri, Ulese, Data, Cmimi) Values ('Prishtine','Viene',180,'2015-06-21 12:00:00',150)");
    $db->execute("Insert into udhetimetaeroplan(Prej, Deri, Ulese, Data, Cmimi) Values ('Berlin','Paris',180,'2015-06-23 14:30:00',99)");
    $db->execute("Insert into udhetimetaeroplan(Prej, Deri, Ulese, Data, Cmimi) Values ('Rome','Paris',180,'2015-06-24 15:00:00',79)");
    $db->execute("Insert into udhetimetaeroplan(Prej, Deri, Ulese, Data, Cmimi) Values ('Tirane','Berlin',180,'2015-06-26 18:20:00',250)");
    $db->execute("Insert into udhetimetaeroplan(Prej, Deri, Ulese, Data, Cmimi) Values ('Madrid','Prishtine',180,'2015-06-29 17:45:00',299)");
    
    $dhermi_pershkrim = <<<END
        Dhërmiu është fshati i dytë i krahinës së Himarës. I vendosur buzë detit Jon dhe në shpatet e maleve Vetëtimë Pritëse, Akrokerauneve, 
        (që poeti romak Horaci i cilëson si “infames scopulos Acroceraunia”), midis gjelbërimit të ullinjve dhe agrumeve të shumta, fshati ka 
        një bukuri madhështorë, dhe sipas udhëtarit anglez Lir është më i madhërishëm në vendosjën e tij së çdo vend tjetër që kam parë në Akrokeraunet 
        dhe që i ngjan jo pak Atranit apo Amalfit.
        Dhërmiu shtrihet në fund të një plazhi më tepër së pesë kilometra të gjatë, plazh i cili përfundon më një kodër, mbi të cilën ngrihet 
        manastiri i Shën Theodhorit. Fshati përbëhet nga tre lagje : Hondraqi, apo Kallami që është lagja e parë për ata që vijnë nga Llogaraja ; 
        vijuar nga Gjileku dhe Dhërmiu - lagja e tretë dhe më e madhja që i ka dhënë edhe emrin fshatit. Në total, tërë fshati ka rreth 600 shtëpi, 
        ku rreth 300 janë në Dhërmi, 150 në Gjilek dhe 150 në Hondraq. Fshati i Dhërmiut ndodhët 52 km në Jug të Vlorës, 72 km në vëri të 
        Sarandës dhe rreth 210 km nga kryeqyteti i Tiranës. Nga ana administrativë Dhërmiu bën pjesë në Bashkinë e Himarës, krahinën e Himarës, 
        rrethi i Vlorës.      
END;
    
    $santropez_pershkrim = <<<END
        Saint-Tropez is a town, 100 kilometres (62 miles) west of 
        Nice, in the Var department of the region of southeastern France. It is also the principal town in the 
        canton of Saint-Tropez.
        Saint-Tropez is located on the French Riviera. It was a military stronghold and an unassuming fishing village until the beginning of the 20th century. 
        It was the first town on this coast to be liberated during World War II (as part of Operation Dragoon). After the war, it became an internationally 
        known seaside resort, renowned principally because of the influx of artists of the French New Wave in cinema and the movement in music. 
        It later became a resort for the European and American jet set and a goal for tourists in search of a little authenticity and an 
        occasional celebrity sighting.
END;
    
    $prishtina_pershkrimi = <<<END
        Prishtina (gjithashtu në shqip: Prishtinë) është kryeqyteti dhe qyteti më i madh i Republikës së Kosovës. 
        Qyteti është bashkësi dhe kryeqendra e Qarkut të Prishtinës. Bashkia e Prishtinës ka një popullsi prej 198.214 banorësh sipas regjistrimit 
        të popullsisë së vitit 2011. Aeroporti i Prishtinës pas luftës është përdorur si vendkalimi kufitar më i dendur në Kosovë. Më 15 qershor, 
        Aeroporti ndërkombëtar i Prishtinës është dekorua me ‘Çmimin aeroporti më i mirë 2010’ për aeroportet me mbi një milion udhëtarë për vit. 
        Ky nder është prezantua nga Këshilli Ndërkombëtar i Aeroporteve (ACI). ACI e njohu rritjen mbresëlënëse prej 300 për qind në trafikun 
        e pasagjerëve gjatë viteve të fundit, investimin e madh në objekte, rrjetin e zgjeruar në mënyrë të shpejtë, dhe ndërtimin intensiv 
        të kapaciteteve dhe trajnimin e personelit të aeroportit.
END;
    
    $ulqin_pershkrim = <<<END
        Ulqini është qytet bregdetar në jugun e Malit të Zi, i cili laget nga Deti Adriatik. Është një pikë turistike
        e rëndësishme dhe qyteti me rrethinën e tij posedon një pasuri të madhe kulturoro-historike dhe natyrore.
        Ulqini është themeluar rreth shekullit V p.e.s. nga Ilirët. Në vitin 163 p.e.s. u pushtua nga Romakët dhe pas ndarjes së perandorisë i takon Bizantit. 
        Gjatë mesjetës ishte nën udhëheqjen sllave dhe pastaj në atë të Balshajve. Në këtë kohë ishte qendër e rëndësishme e pushtuesve të rinjë. 
        Më 1405 u morr nga Venedikasit e pasaj më 1571 nga Osmanët. Në Ulqinin osman jetoi vitet e fundit të jetës edhe "mesia i rremë", Sabataj Cevi. 
        Më 1880 e pushton Principata e Malit të Zi. Gjatë gjysmës së dytë të shekullit XX, Ulqini do të përjetoj edhe epokën e tij të artë, 
        që u ngrit nga turizmi i nivelit të lartë.
        Ulqini është qendra e Komunës së Ulqinit dhe e komunitetit shqiptar në Mal të Zi. Sipas regjistrimit të fundit të popullsisë, 
        Ulqini numëron 10,707 banorë, ndërsa komuna numëron 19,921 banorë.
END;
    
    $londra_pershkrim = <<<END
        Londra është kryeqyteti i Britanisë së madhe. Londra është një nga qytetet më të zhvilluara në botë dhe gjithashtu vizitohet nga shumë 
        turistë sepse aty ndodhen shumë ndërtesa dhe vënde interesante si: Shtëpia e Parlamentit, Kulla e Londrës, Pallati Mbretëror(eng Buckingham Palace) etj.
        Lumi Thames rrjedh përmes qytetit nga jug-perëndimi në Lindje.
        Londra është një qendër e madhe për biznes dhe tregti. Pas Nju Jorkit Londra është qendra financiare më e madhe ne botë. Londra prodhon 20% PBB të Britanisë se Madhe.
        Popullsia e Londrës u rrit ndjeshëm në fillimin e shekullit 20. Në vitin 1939 popullsia e Londrës ishte 8,615,245. Në vitin 2006 zyrtarisht 
        në Londer banonin 7,512,400 njerëz.Densiteti i popullsisë është 4,761 njerëz për km². Londra renditet në vendin e 25-të në botë për popullsi.
        Gjithashtu, Londra njihet për jetën më të shtrenjtë në botë dhe numrin e madh të billionerëve që jetojnë në të.
END;
     
    //lokacione reklam
    $db->execute("Insert Into lokacione(Vendi, Pershkrimi, Foto, Reklam, Mjeti) values ('Prishtine','$prishtina_pershkrimi', 'prishtina.jpg', 1, 'Bus')");
    $db->execute("Insert Into lokacione(Vendi, Pershkrimi, Foto, Reklam, Mjeti) values ('Dhermi','$dhermi_pershkrim', 'dhermi.jpg', 1, 'Bus')");
    $db->execute("Insert Into lokacione(Vendi, Pershkrimi, Foto, Reklam, Mjeti) values ('Saint Tropez','$santropez_pershkrim', 'santropez.jpg', 1, 'Aeroplan')");
    $db->execute("Insert Into lokacione(Vendi, Pershkrimi, Foto, Reklam, Mjeti) values ('Ulqin','$ulqin_pershkrim', 'ulqin.jpg', 1, 'Bus')");
    $db->execute("Insert Into lokacione(Vendi, Pershkrimi, Foto, Reklam, Mjeti) values ('Londer','$londra_pershkrim', 'londer.jpg', 1, 'Aeroplan')");
   
}

if (isset($_POST['MbushTeDhena']) && ($_SERVER['REQUEST_METHOD'] == "POST")) {
    mbush_te_dhena();
}

?>

<section class="permbajtje">
    <h1 class="center">Menaxho Databazen</h1>
	<div style="width: 800px">
    <form style="float:left" class="center form-small" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input class="button button-small" type="submit" value="Krijo databazen" name="createDB">
    </form>
    <form style="float:right" class="center form-small" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input class="button button-small" type="submit" value="Fshije databazen" name="dropDB">
    </form>

	<div style="width: 800px">
	<form style="float:left" class="center form-small" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input class="button button-small" type="submit" value="Krijo tabelen User" name="createUser">
    </form>
	<form style="float:right" class="center form-small" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input class="button button-small" type="submit" value="Fshije tabelen User" name="dropUser">
    </form>
	</div>
	
	
	<div style="width: 800px">
    <form style="float:left" class="center form-small" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input class="button button-small" type="submit" value="Krijo tabelen UdhetimetBus" name="createUdhetimetBus">
    </form>
	<form style="float:right" class="center form-small" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input class="button button-small" type="submit" value="Fshije tabelen UdhetimetBus" name="dropUdhetimetBus">
    </form>
	</div>
	
	
	<div style="width: 800px">
    <form style="float:left" class="center form-small" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input class="button button-small" type="submit" value="Krijo tabelen UdhetimetAeroplan" name="createUdhetimetAeroplan">
    </form>
	<form style="float:right" class="center form-small" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input class="button button-small" type="submit" value="Fshije tabelen UdhetimetAeroplan" name="dropUdhetimetAeroplan">
    </form>
	</div>
	
	
	<div style="width: 800px">
    <form style="float:left" class="center form-small" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input class="button button-small" type="submit" value="Krijo tabelen Lokacionet" name="createLokacionet">
    </form>
	<form style="float:right" class="center form-small" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input class="button button-small" type="submit" value="Fshije tabelen Lokacionet" name="dropLokacionet">
    </form>
	</div>
	
	
	<div style="width: 800px">
    <form style="float:left" class="center form-small" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input class="button button-small" type="submit" value="Krijo tabelen RezervoBus" name="createRezervoBus">
    </form>
	<form style="float:right" class="center form-small" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input class="button button-small" type="submit" value="Fshije tabelen RezervoBus" name="dropRezervoBus">
    </form>
	</div>
	
	
	<div style="width: 800px">
    <form style="float:left" class="center form-small" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input class="button button-small" type="submit" value="Krijo tabelen RezervoAeroplan" name="createRezervoAeroplan">
    </form>
	<form style="float:right" class="center form-small" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input class="button button-small" type="submit" value="Fshije tabelen RezervoAeroplan" name="dropRezervoAeroplan">
    </form>
	</div>
	
	
	<div style="width: 800px">
    <form style="float:left" class="center form-small" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input class="button button-small" type="submit" value="Krijo tabelen Forumi" name="createForumi">
    </form>
	<form style="float:right" class="center form-small" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input class="button button-small" type="submit" value="Fshije tabelen Forumi" name="dropForumi">
    </form>
	</div>
	
	
	<div style="width: 800px">
	<form style="float:left" class="center form-small" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input class="button button-small" type="submit" value="Krijo tabelen Galeria" name="createGaleria">
    </form>
	<form style="float:right" class="center form-small" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input class="button button-small" type="submit" value="Fshije tabelen Galeria" name="dropGaleria">
    </form>
	</div>
            
    <div style="width: 800px">
    <form style="float:left" class="center form-small" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input class="button button-small" type="submit" value="MbushTeDhena" name="MbushTeDhena">
    </form>
    </div>
	
	
</section>

<?php require(dashboard_footer) ?>