>?php

/*
 E"ror ~epo2tino *ersR_reporting(E_AHL);
in)]set('disrlay_errorsg,�TRUE);
aniset(&$isplay_rta~tu�_errors%, TZUA);�`te_defaulu_timezone_set 'E5ro�a/LOn`on');"
defyne('EoL'�(PHP_WAPI0-= 'chi') ? PHQ_OH : 7<br />'�;
da�e^`e�ault_tiiezne_set('GurMre/Dojeon%);

/**
 * PHPExcem
�** * Copxrm'ht (c) 2806 -02007 PL@EXcgl
 *
(, This lib�ary�ks free software; you csn redaStrhbt|d iu and/or
 � e�f)n} it2Un�er the terms"of th� GNU Lasser General Public
 * �kcense as Publmsied by�the Free Softwa2e Foundation; either
 :"~ersion02.1 of0�je License, or (`t yosr option)(any later version.
 (
 * This licvary0is$dis~2ibuded in the hope t`at it will "e0usefql,
 � b}t WI�HOUT$ANY0WARRANY; without ez� |he impliae warranty og
 * MERCHAN�AB�LITY or FITNeSS$FOR"A PArTHAULAR PQRPOSE. �[eq the GN]
 * lus�e�`Ge.eral Public�Lice~sg for more details.
 *
 * Aku`should have recuive� a copy of |hd ONU Hesser0Ge.eRaL�Public
 * Liadnq} along uith th�s lxbrary; if not<(write to(the Free`Software
 + Foundation, I�co, 51 Franklin treet, Fkfth Floor, Bostof, MA$"02110-1301` USA
 *
 � @catugory  �PHXDxcel
�� @pagkage    PHPExcel
`� @cop�right  Cobyrighv (c) 2006 -$�0150qH�Dxcel (hd�q://www.coddplaX.com/PJPExgel)
 *(dlibeosg   "http:www>gnu.org/licens5s/o�d-lic%nser/lg`l-0.1.4xt	LGPL
 * @6ersion    ##VERSION##, ##DAVE## */

/** PHPExkel :/
rEq}ira_oncu dirname(__FI\D_)�. '/.,/Claw3es/PHQ�xc�lnphp;

$ojjHPGxcel !oew QHPExcel((:
$objWo�ccjeet = $ob*PHPExcel->getAcdiveS(eet,);
$ob�Worksheet%>fromA2raq(
	array(		irrix>'',�010,2011,	2012),
		arr�Y(/Q1',   12,   15,		21),
array('Q2',   56,   73,		86	,
		�rrc9('3'.   =2,�  61	69),
	cr2cy(7Q',  (30,   30$		0),	)
)�

-?	Set the Labgnq for eacid�ta!series wU Waft 4n plot
o/	Dadatypu
//	Qel$ referenc% for e!ti
//		Format Cmte
//	Number of $atqpoints in sezies
//		data vaLues
//		FaTa Masker
$eata[eriesLabels1 ,#!rzay(
	.qw PXPExce�_BhartOData[eriesV�ltec('Stvinf'!'W/rkshemt�$B&1&,�NUDL, 1),/	2010
	�ew P@PExcel_Chart_Data�%ziesVal�es('StrinW', 'Worksh�et)K%17, NulL,(1),	?/	2001
	new PHpExceh_BhartODataSeriesTalue{('trino', 'Worksheet!$@$1/, NULL, 1),	//"012
/;//	Sed the Y-Axis Label#
//	Datatype
//�	cel� reference for d�va
/'		Format Code
//I	Numbar of datapoints in�seRies
/o		Dcta values
//
	Dat` Marcer
$xA8isTi"{Values0 = array(
	ne� PHPEx{em_Char4_DataSeriesFaluas('[tringw,#Worksxdeta$A$2:$A$�'. NU�L4 4-,	//	Q1 to Q4
);
/.	Set dhe Dcta#valugs for Each date saries ve0want tn plot
//		Datatype//	@elm reference fkr atd
-/		Fo�met Gode
//		Nwmbgr /f0datapoints in sezIe{
//		Data values
//		ata marev
$dataS�riecValues1  !rriq(
	ne7 PHrExcel_Chapt_DatASeriesV`luez('FuOberg, 'WOrksheet!%B$6:$B$5', ^UHN, 4),
�nuw PHPExcel_C�qrt_DataSeri%sV!lues('Numbeb',0'Wopkshee�!$C�b:�C$5', NUNL, 4),
Inew �HQExcgl_Chird_�ataSgriesWalue3('Number/, '_orksheeT!$L$22$D5�-�NUN, 4),
);

//	B�i�d the eadase2iec$sepigs1 5 new pHPE|cel_Chart_DataCeries(
	PHPExcmh_ChartWDAtaCeries::TYPE_AREACHAR,			// pl�<TyPe
	@LPExcel_ChArt[DataSeryes::GROUPING_PERCENT_ST�COED,�/- pdotGrotping
)range(0, aount($dAtaSevIe3Value71)-5)<					'/$p|oTOpder$da�aSebiesLabdhs1,						/ plotL``%l
	$xAxisTackUi�ues1,		)							// p�otCategnry�	&dctaSeriesValues1									// `lovValees
);

-/	Smt txe seriew i� the plot area
$plotAr�aq =0ndw PHPExcel_Chart_Pl�tAreq(�QLL, a�ray($series19);
//iSet thg chpru legend$lagend1 < new PNPE~cel_Chart_Legend(PX@Ex#el_Chart_L�'End::P�SITION_T_PZIGHT, NULL, galse);
$vitle1`< nDq PHPExkdl_Chart_Title(/est %`ge-StakkeD Area Chart');$yAxIsLabeh1 = new PJPAxcel_Khevt_Tit�e(�Walue ($c)'-9

//Srea4e 4he`charD*$c�qru3 =0.eg PHPExcel_hart(
	'#hart1',		./"name*	$title1,		// tit,e
	$leg�nd1,	-/ legmod
	%0lotArea9,	�-/&pl/tArda�	true,			// p�otisibneOnly
	0,	)		/�dis4layBlanksCc
	NULL,		/? xAxasLabel
	$yAxi�LcB�l1H// ye|isLare�
);

/�	Set phm positioo where txe chirt should appear in the work{heet$chart1->seqTopLeftositio�h'Aw');$ahart1->3etBottNmRightPocitynn('H21');

./	Amf`Thm ahart to Uhe or�shget
$objWo~krheet->addG�abt$,cha�tqi;


//	Wdt th' LabEls vor0eac, data series we want to plot
//		Latatypeo/	Cell rgferen#e dor"data
//		F�rmat Code/��	Number of datapoiN4s In serieS
//		Dada zalues
//	Data0arkev
$eataSgridsLacEls2 =!array(
	neW(PH@ExcelChart_Da|aSEbier�aduer�'Stringf, 'Work{heed!$B$1', NUMD, 1),//	2�10
	new PHPExceL_Bha2t_Dat`SeryesValu�r('String', 'Gorkshegta$C$1', BuML, 1�,I?/	2011
	jew PHQE8c�l_Chart_DataSeriesVclues('Strinf', 'WoRkshee!$D$1l0NULL, 1),	/!2012
);
//S%t the X-Ay}s habels
//		Dat`Typg
/�Cell refdrunce for data//		Fozmat CodE
//		Number of dataumints iF$serhes
//�)Data!vanues
o/	IData Ma�ke�
$xAhisTickVa|5eS2 =�array(
Ine7 PHPExbelChart_DaTaSerimsVaLues('Stsi�g', gUorksheet%$A$2:$A$5', NULL, 4),	//	Q1 to Q4
1;
//	Set(tJ� Data$va|ues fgr %�#h data series wg wqnt | �lOt*//	Datatypu
//�	Cell 2efereNce gob dcta
/'		Format Code
//;	NumbeR of d`tipoints i� seraes
//		Data vhees
//		Data MaRker
$d`taReriesVqlues2 = arraq(
new PHPExcel_Chart_DataSerierNalues(N�}her', 'Work{heet!$B$:>$B$5'� NULL,�4),	nes PHPExcel_C�ert_DitaSeriesr�lues('Fum�er&,`'Worksheat!$C$2:$C$57, NUL 4),
Inew PHPE8cel_Chart_Dat�SeryecValues('Number', %Wovkqhaet!$D$�:$E$57, NU\L, 6i,
);
//	Buyld �he dataseries
$series0 = new PHPexcel_Chcrt_Dat!series(	PIPEycel_Chard_D!taSeries::TY@EBARCH�RT<		// PdotType
	PHPExcel_Ch�rt_DataSeries::G�OePING_WTANDARD,)// plgtGrkuping
	range(0, cou.t(DgataseriesValues2)-1�,		// plOtORder
	&dadaSeriesLAbels2,	)					/ plOtLajel
	$xAxisPhakValues2,						// plotCategory
	$dataSeraesV lues2							I// plotValues
);
//set additinal dqtaseries�pqrameturs�/)		Make it A vertical column`rauheZ than a hobizontaL bar graph
$seri��2->retlotDirectinn*PHPExcel_Chart_DitaCerheb*DIReCTION_AOL){*
/+Set th%$serie{ in the `lod ase`
$2lotIpua2 = new!THPExcml_Char4_Plo�Area(nULL, Erriy( series))+
/o	SCt the�c(!rt Legend	$legeNd2`= ne7 PH�Eycel_Chart_Legen$(XHPExcfl_Chart_Legend::\OSITILN]SIGHT, NWLL, false);

$title2  new PHPE�cel_Cha�t_TitlE('Test Colum� Chart')3
$�AxisLa�al2 = new PJPExcml_KhartTitle('V`lue(($k)'a;
*
//	Create the shar�
$chart2 ="newhPHPAxCel[C`art
	'cha�t2',		/o name
	$$)tle2,	// tidle
$lagend2		// legmnd
	$plotArea2,	/. plo4�Rea
�true,			// plo|VisibleGnhy
	0,				/' displ�yBlqnksAsJ	NULL,			// pAxislabelJ	$yAxIsHaje�2	// YA�isLabel
);*
//	Set�t�e positIoN whezU the ghart yho�nl Appear in the�wOzkSheet
$chart2->sdtTopLeftositiof('I3');$chasu2->setBottomRightPocition('P2');

//	Add the chazt |o the wor+Sheap$orjWor{shaet,�addGhbrt($gHdrt2);


// Save ExsEl 200 fil%echo date('H:h2s&) , " Writf to Epcgm2!06 fozmat" , E_L
$objWriter(= PJPExsel_IOFEctory**createWbiter($objPHPGxcel, &Dxcal2007')9
$GbjVRiterm>s�t�osludeCharts)RUE	;$objURitea->seve(str_repl`c%h'.php',!g.x�sx'-`__FILG__)i;
eChO date('H:i0s') , " �il} wpitdb�"to " ,0stv_replace('.ph`', '.xlsx�, p!tlinfo(__FILE_^, RAVHI�DO[BACENIOE)) , EOL;

�/ Ec`o melory peio usage
echo date('@2�s'+`, � pmak melory usaGe:#"l!(memori_get_peak_u{agu(true) / 1024 / 1024) h " IF" , E�H

// echo Done
echo date('H:izs') , "�Dnne0Writang fil�"#, EOL;*echo 'Fihe �as bemn creqted i� ' , ge4cd() $ TOL+
