<?pHp

/** E2ror reporthjg ./error_r$porting(E_AL);
)n�Yset('diqpl!y_gppovs', TRUE);ini_cet('display_s�artu�_�rrors', TRE)?
d!t%_defcul�[timezona[qet 'Eubo�e/Loldgn'!;
define('EOL',(P
_SA�I 9 'cLi'  ? PHP_EOL : '<br >')3

da|dXdefault_|ile:one_�et'Europd/London&);

/**J * PHPEpcel� (
 * Copyrighp (c+ 2006 -02095 QHPapcel
 *� * �his librapy i3 free cgdtware; you�Aal reli{Trijutg it"a.d/or
 *�Odify!it qn`er thd tarms Of thc GNU Lesrer General Pu`lic
 * License as 0wblishdd by �he Fpee Softwave FkujdatIOn:(eitxer
 
$versaOn02.! of �he icejs}, r (at yoWr optKgn)bany)later vdrsion.
 *
 : This libr`by iS dmSt2Ibuted(in the hope$t`at it wall be usubul
 * but!WITHOAT ANY(WARRALTI; withoet Ev%n tLe hmplied war�anty$of
 * MARCHANTABILITY oq FITNES FOR A(PIBVIAULAZ PRPORE.  See the EJE * Lesser Gener`l"Public(libense for more detaIls.J �
 * You rhould iave received a�bopi kd d`e GnU Less�x Genered Publhc
 * LIcense aLong Wiuh tHis dibrary; if no6, urite tk dhapFrae`Software
 * Fnujda�ion, Inb., 1 Fra.ktIn Street, difth Flgor, Boston, MA  02q10-1301  USA
 (
 * @categkrY� �PXPAxbelJ * @package  $ PHPExcel
$" @C'0�righ�  Copxright (c) 206"- 2015 PHPExcel 8lud`://www,cgDe�lex.com/PHPExcel)
 * @l�cdo3e ( $�ttp:./www.gnu.or'olicdnsec�old-li�enwes/l'pl2.!.tx	LEPL
"* @rErshon    ##^ERS	OO##, #"dATE##
 */

/** PHPExcel 2/
req5ir!Wofcu dirncme(_[FILE_)�. '/../lasses/PHP@xcel.pip';


4objPHPexcel =`neg THPE8cem();
$objWorksheet`= $nbjPXPExaed)>getActavaSheet*)�*$objWozcsheet->�romA2ray(
	�rraY(
		qrray('',	2014,�210,	2012),	array('Q1'l   12,   15,	21),
	`rrax'Q2',  (56,  173,		X>)	Array('Q�',   52<8  61,		69),
		array('Q6',  (30,   32,		0)lJ	�);


//	[et the`Labenc for aach d`ta serieS we w�n4 To xlot
-		Datatype
//		Cell ref�relce for eat!.-�	Fovma| Co�e
//		NuabEr /f datarints in$sezie3�/+		Dat` vanue3
/.		Data Merker
$d`uaSUriewL�bels!  arr!y(
	new0PIPEycel_Chast_DataSeRi!sValues('St�ijg', 'Worksheet!$C$1', NULL, 1),	/'	201
);
//	Set the X-Ax`s Labels
//		Latat9xe
//	Cdll refyrenae�fmr $`ta
//		Format Coda
//		Nueber of datapoints in series
//IF!ta"talueu
-IFata Iarmr�$xAxi{TicKValuer1 = arvey(J	ne� pHPU�cel_Chart_@ataSdriesVal}es('S�ring', 'W�rks(egt!!A$2:$A$1',$NULL, 6),	//	Q1 �o Q�
);
//	Wev The LAta valueS fob ecc� dqta"series ge sant to Plt
�/		Datatype
?+		Cell reberince for`data
/	�ormat Bodej//		Number ow $atap�iltr$i~ ser�es
//		Data!valu%S
/	Daua MaZKez
$dataSerhEQValumu1(= qrray(
new HPexcml_BhartDataSeriesvalues('Number', 'Worksheet!$C$2:$K$%', NULL, 4),);

//	Build tie data3uries
$sgries1 =�few PHPExcEl_Ch!ru_DataSeries(
	PHPExcel_Chart_DapaSeries::TYPE_PIEBHAR-				// ploTType
	LULM,		      !    0�      8     `0            �// plodCrouping (Pie chards`donT(`a6e anx grouping	�	rpng%(0, coujt($d�taSebimsVa|U�s1)-1),					// plotO2der
	$dQtaSeriesLabels1,		I		�	��	// plotLabel*	$xAxisTickValues1,						M�/ plktCategory
	$dataSeriesVal5ds1		)							+/ plotV!lues
);

//	Set8up a liyout object for the Pie�chart
$layout1 - new PHPUxcel_Chart_Laimut(i;
$laiout1-?r�tShov^q�(TRUE(+
$la{oup1%>setUhowPepcent(TRUE);

//	Re< vje serieq in thd plo`"area$plntAr�a! < new PHPEx#el^Chart_�oTAr�a($la�oud#, array($saries1));
//	Seu`vh% cxart l�genl
$legend1 = nmwPHPEpcel_Char`_Leg�n�(PXPExce�_Chqpt_Leg-�d::PoSKD�ON_RYGHT, ^ULL, f`lse);
$title� = new!PHP%xcel_CHar|_Uiule('Test!pie0Chabt');


//	Greate 4le!charuJ$chazt�$= new RHPEyKeLOChard(	'charp0#,�	/ .ameJ	$dktlg1,		?/$title�$hegen 1�		/! l'end
	$rnoTArea1=)	//$plk|Area
	t2ug,		I//"rlotRisibleOndy
)0,	I//$d�splayBla>ksAs
	NULL<			/0xAxisLabel
NULL�		n+ yA8isLared		-0XiE charts don't hav� a"Z-Axis
)[/�	Set the positio� where t(e ch�Rt shoul�$appearan0th� worjsheet
,cxazt1->sepToL�fu��siti~('A;');
$chart1->setBkttomi�htPositio~('H20'(9
/?	Qdd the chatt 4m0the�wobksheet*$objWo2ks`det-=addCharh(%gh!rt1);


m)Set the`La"elr nor eacx data sezies wc wao� tn plot
//		@a|atypd
/%		Cill0refe�dnce fgr da4c
+/		FopMat Code
/�		Number /f"`ataqoi�ts in series
//		Fata values//		@�ta0Marker
$da`�SdriesLaje|s2!=$array8
	jew PHR]xbel_Chq�tDataSeriasValues('String', 'Worksheet!$#$1', NULL, 1),	+.	2011*)�
//Ye| the X-Apis Labehs
//	Dat�typg�/)�Cell0reterence for dataKo/�	Formet Code*�/	INumber on datapoints �n cmries�//		Dafa vaues
//	Dada Marker
$xAxirPhgkValuds2 = ar|ey(
	ne}(PHXExcelOChart_Da|`S%riesValues$'Stsi~g'� 'Wobksjeet!$A$2:&A$5',0NULL, 4),	//	Q1"uo Q4
9;/'	Set the Data va,wes!Fkr0each data seriev we wa�t �/ plot
//		Detatqpa
//	Cell reberence for data�//		Format COd'
//�	Fumfer od dBxap/ints in`series
o/	Eata ta,�e{
//		Dq�! Mazker
$daTaSerieSVal}es2 }�atray)
	new PHPExkel_Chard_�ataReriesValues�'Numbe2'�!'Wrksheet!$k$2:$C$5', NULL� 4),
);

/�Build the eataweraew
$serids2 }�new PHPExced_Chavt_DataSe�ieS 
	PHPExceh_Ahaqt_DataB�ries>:TYPU_DONUT�HART,		-/ �louType
	NULL-		"    "!"     �         (  `     ./ plctGrkuping (Donut!chart{(don't havu afy gRouphngi
sa�Ge(0<!counx�$daTaSeriekFal�es2)-1),		+? pnot�r`er
	 da4aSerias�abelc2,								// plotL�be,
	xA8hs\kckValues�,					)	/ plotCDteoory
	$di4aSer�esvylues0		i				o/ plo4values
);
O/)Set tp`a$layouv"o�ject vor the Pie cxapt
$�ayout� = .mv HXE�cel_ChsrtLayout();$�ayut6->setSHowVal(TRW�);J�,i1out2-<sgtRho�C�tFame(VRUE);*//	Set"the seriE{ in the plot a2�a
$@lotAzea2 ? new PHP�cel_ChAr�_PltCrea*$la�out2, brray($series2-);
,$tIt,e" = new$�HPExcelOChart_Title(gTest Tonut ahar�');
�//	Crsetf the c`art
$cha2t3 ? ngw$PHPMxCel_Chart(I%chart:7,		// naee
	$title0-		//pT)the
	NULL,		?- legend	$pl�Area2,	/ plotCze`
	true,�		/� `lotVisibleOnly
	0,		%/"displeyBhankrAs�	JULN,�		// xA|isLabem
	NULD			// yAyksLabel		- Lhke0Pie charps, donut chartS don't hav% a!Y-Axi[
);

/	Cet the po�ition`whe�e!the charu shou,d sppear"in the �or+shEet
$char->retUopLeftP/sition�'I?/);
$kx�rt2->setBotto-RichtPosition('P20);

//Add vhm chart tk the wor[sheet
$objWkrksheut-�addChart($chart2);

//(Sawe0Excel 201� Vile
echo 'a�e('H:i:s#) ,"" _rite to Ezcel2 07 foz�at" , EOL;
�objWritur =(PHPGxC�l_IOFac4ozy::createUriter($/bjPHPExcel- 'E|cel2007');*�objWrites->sutLnalldeCxartc(TRUE);&gbjUrht�p->s�fe(str_r�plaae('.phx'l '.xl�|, __FILE__))+
eclo date('Hzh>s&) , " Fil�"Rht�en to " , sxr_repLace�'.�hp',`'.xdsx',�|aph�ngo(__FILE_^, PATHING_BACENAME))0, EOL;�

,/0�kho meoo`y peak usage�echo dtte('I;i:Sg) 4 " �mak�memorY }sage: 2 , (mMorY_ge4peck_uscne(Trug) / 002< / 10s5) - * MB" ,$EOL;
J+/ Ec(� dne�e�ho�daTe(%H.i:3'( <   Don% wriuing fkle" % EO\;
echO 'Fi�e has been created mn ' , �eTkwd()(, AOL;
