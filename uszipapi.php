<?php  header("Access-Control-Allow-Origin: *");
//autotext us zipcodes
//Ref for zipcode range: http://www.structnet.com/instructions/zip_min_max_by_state.html
//somdutt ganguly
//tosomdutt@gmail.com
//value
$no=$_GET["query"];
$no3=substr($no,0,3);
$no4=substr($no,0,4);
?>
<ul class="list-unstyled">
<?php 
// 5 or 4 charater zipcodes
$jsonvalue='[
{"start":"6001","end":"6389"}
,{"start":"6401","end":"6928"}
,{"start":"1001","end":"2791"}
,{"start":"5501","end":"5544"}
,{"start":"3901","end":"4992"}
,{"start":"3031","end":"3897"}
,{"start":"7001","end":"8989"}
,{"start":"6390","end":"6390"}
,{"start":"5001","end":"5495"}
,{"start":"5601","end":"5907"}
,{"start":"35004","end":"36925"}
,{"start":"99501","end":"99950"}
,{"start":"71601","end":"72959"}
,{"start":"75502","end":"75502"}
,{"start":"85001","end":"86556"}
,{"start":"90001","end":"96162"}
,{"start":"80001","end":"81658"}
,{"start":"20001","end":"20039"}
,{"start":"20042","end":"20599"}
,{"start":"20799","end":"20799"}
,{"start":"19701","end":"19980"}
,{"start":"32004","end":"34997"}
,{"start":"30001","end":"31999"}
,{"start":"39901","end":"39901"}
,{"start":"96701","end":"96898"}
,{"start":"50001","end":"52809"}
,{"start":"68119","end":"68120"}
,{"start":"83201","end":"83876"}
,{"start":"60001","end":"62999"}
,{"start":"46001","end":"47997"}
,{"start":"66002","end":"67954"}
,{"start":"40003","end":"42788"}
,{"start":"70001","end":"71232"}
,{"start":"71234","end":"71497"}
,{"start":"20331","end":"20331"}
,{"start":"20335","end":"20797"}
,{"start":"20812","end":"21930"}
,{"start":"48001","end":"49971"}
,{"start":"55001","end":"56763"}
,{"start":"63001","end":"65899"}
,{"start":"38601","end":"39776"}
,{"start":"71233","end":"71233"}
,{"start":"59001","end":"59937"}
,{"start":"27006","end":"28909"}
,{"start":"58001","end":"58856"}
,{"start":"68001","end":"68118"}
,{"start":"68122","end":"69367"}
,{"start":"87001","end":"88441"}
,{"start":"88901","end":"89883"}
,{"start":"10001","end":"14975"}
,{"start":"43001","end":"45999"}
,{"start":"73001","end":"73199"}
,{"start":"73401","end":"74966"}
,{"start":"97001","end":"97920"}
,{"start":"15001","end":"19640"}
,{"start":"29001","end":"29948"}
,{"start":"57001","end":"57799"}
,{"start":"37010","end":"38589"}
,{"start":"73301","end":"73301"}
,{"start":"75001","end":"75501"}
,{"start":"75503","end":"79999"}
,{"start":"88510","end":"88589"}
,{"start":"84001","end":"84784"}
,{"start":"20040","end":"20041"}
,{"start":"20040","end":"20167"}
,{"start":"20042","end":"20042"}
,{"start":"22001","end":"24658"}
,{"start":"98001","end":"99403"}
,{"start":"53001","end":"54990"}
,{"start":"24701","end":"26886"}
,{"start":"82001","end":"83128"}
]';

$json = json_decode($jsonvalue,true);

foreach($json as $item) { 

    $start = (int)$item['start']; 
    $end = (int) $item['end']; 
	
		if(strlen($start)==5) {
			writezip($start,$end,$no,$no3,$no4);
		}
		if(strlen($start)==4) {
			writezip4($start,$end,$no,$no3,$no4);
		}
}
 ?>
 
 </ul>



<?php 

//handle 5 character zip code
function writezip($start,$end,$no,$no3,$no4) {
	$startcomp=(int) substr($start,0,3);
	
	if($no3 >= $startcomp  ) {
		for($i=$start ;$i<=$end;$i++) {
		if(strlen($no)>3) {
			$no4 = (int)$no4;
			$i4 = (int)substr($i,0,4);
			if($no4 ==$i4) {
			echo "<li>" . $i . "</li>";
			}
			
		} else {
			$i3=(int) substr($i,0,3);
			if($no3 ==$i3) {
			echo "<li>" . $i . "</li>";
			}
		}
	}
	}
}

//handle 4 character zip code
function writezip4($start,$end,$no,$no3,$no4) {
	$startcomp=(int) substr($start,0,2);
	$no3=(int) substr($no3,0,2);
	
	if($no3 >= $startcomp  ) {
		for($i=$start ;$i<=$end;$i++) {
		if(strlen($no)>2) {
			$no4 = (int)$no4;
			$i4 = (int)substr($i,0,3);
			if($no4 ==$i4) {
			echo "<li>" . $i . "</li>";
			}
			
		} else {
			$i3=(int) substr($i,0,2);
			echo "<li>" . $i . "</li>";
		}
	}
	}
}

?>