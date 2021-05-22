<?php
 if($_GET['pid']!=""){

	$look= $_GET[pid];
$poses=post;
		
				include"connect.php";
$sqlCommandd="SELECT id,user_id,post,views,comments,likes,timestamp,image,type,user2_id,tribe_id,location,reposts,role,op,repuser,roles,value1,value2,value1a,value2a,value1link,value2link,post_id
                              FROM posts
                          WHERE id = $look";
$query=mysqli_query($conn, $sqlCommandd) or die(mysql_error());   
	
							 $que	= "UPDATE posts
					 SET views = views + 1
					 WHERE id= $look  LIMIT 5
					";
					$queryx=mysqli_query($conn, $que) or die(mysql_error());  
		//mysqli_close($conn);
			while ($row = mysqli_fetch_array($query)) {
		$content = $row['post'];
		$contento = $row['post'];
		$id = $row['id'];
		$post_id = $row['post_id'];
		$uid = $row['user_id'];
		$views = $row['views'];
		$images = $row['image'];
		$location = $row['location'];
		
				$userwhoid = $row['user2_id'];
				$tribed = $row['tribe_id'];
		$comments = $row['comments'];
		$likes = $row['likes'];
		$t_time = $row['timestamp'];
		$look= $_GET['pid'];
		$reposts= $row['reposts'];
		$role= $row['role'];
		$realp= $row['op'];
		$repo= $row['repuser'];
			$value1= $row['value1'];
		$value2= $row['value2'];
		$value1a= $row['value1a'];
		$value2a= $row['value2a'];
		$roles= $row['roles'];
		$type = $row['type'];
		$value1link= $row['value1link'];
		$value2link= $row['value2link'];
	
		     $url = 'http://www.intellifeed.ga/post.php?pid=' ;
  $via = 'intellifeed_';
 //   $vias = 'www.appdate.co.za';
			}
 }
require('fpdf.php');
class PDF extends FPDF
{
protected $B = 0;
protected $I = 0;
protected $U = 0;
protected $HREF = '';

function WriteHTML($html)
{
	// HTML parser
	$html = str_replace("\n",' ',$html);
	$a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
	foreach($a as $i=>$e)
	{
		if($i%2==0)
		{
			// Text
			if($this->HREF)
				$this->PutLink($this->HREF,$e);
			else
				$this->Write(5,$e);
		}
		else
		{
			// Tag
			if($e[0]=='/')
				$this->CloseTag(strtoupper(substr($e,1)));
			else
			{
				// Extract attributes
				$a2 = explode(' ',$e);
				$tag = strtoupper(array_shift($a2));
				$attr = array();
				foreach($a2 as $v)
				{
					if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
						$attr[strtoupper($a3[1])] = $a3[2];
				}
				$this->OpenTag($tag,$attr);
			}
		}
	}
}

function OpenTag($tag, $attr)
{
	// Opening tag
	if($tag=='B' || $tag=='I' || $tag=='U')
		$this->SetStyle($tag,true);
	if($tag=='A')
		$this->HREF = $attr['HREF'];
	if($tag=='BR')
		$this->Ln(5);
}

function CloseTag($tag)
{
	// Closing tag
	if($tag=='B' || $tag=='I' || $tag=='U')
		$this->SetStyle($tag,false);
	if($tag=='A')
		$this->HREF = '';
}

function SetStyle($tag, $enable)
{
	// Modify style and select corresponding font
	$this->$tag += ($enable ? 1 : -1);
	$style = '';
	foreach(array('B', 'I', 'U') as $s)
	{
		if($this->$s>0)
			$style .= $s;
	}
	$this->SetFont('',$style);
}

function PutLink($URL, $txt)
{
	// Put a hyperlink
	$this->SetTextColor(0,0,255);
	$this->SetStyle('U',true);
	$this->Write(5,$txt,$URL);
	$this->SetStyle('U',false);
	$this->SetTextColor(0);
}
}

$html = "$content";

$pdf = new PDF();
// First page
$pdf->AddPage();
$pdf->SetFont('Arial','',20);
$pdf->Write(5,"IntelliStudent[PDF GENERATOR]  ");
$pdf->SetFont('','U');
$link = $pdf->AddLink();
$pdf->Write(5,'more...',$link);
$pdf->SetFont('');
// Second page
$pdf->AddPage();
$pdf->SetLink($link);
$pdf->Image('images/logo.png',10,12,30,0,'','http://www.intellistudent.co.za');
$pdf->SetLeftMargin(45);
$pdf->SetFontSize(14);
$pdf->WriteHTML($html);
$pdf->Output();
?>