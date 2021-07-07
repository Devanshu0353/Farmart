<?php
    include("users.php");
    $email=$_SESSION['email'];
	$fid=$_SESSION['uid'];
    $products=new users;
    $products->prod_detail($email);
	$i=0;
	$num=0;
	if($products->pData!=false){
		$num=count($products->pData);
	}
	if(isset($_GET['page'])){
		$current=$_GET['page'];
		$temp=$current;
		$site="productdetails.php?page=";
		$next=$site.($temp+1);
		$previous=$site.($temp-1);
	}
	$img=$products->get_image($fid,$_SESSION['type']);
?>
<html>
<head>
<style>
body {margin: 0; background-color: #C0C0C0;}

ul.topnav {
list-style-type: none;
margin: 0;
padding: 0;
overflow: hidden;
background: rgb(227,162,26);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 32%, rgba(0,212,255,1) 100%);
}

ul.topnav li {float: left;}

ul.topnav li a {
display: block;
color: white;
text-align: center;
padding: 14px 16px;
text-decoration: none;
}

ul.topnav li a:hover:not(.active) {background-color: #C9ADA7;}

ul.topnav li a.active {background-color: black ;}

ul.topnav li.right {float: right;}

@media screen and (max-width: 600px) {
ul.topnav li.right,
ul.topnav li {float: none;}
}
.divider-text {
    position: relative;
    text-align: center;
    margin-top: 15px;
    margin-bottom: 15px;
}
.divider-text span {
    padding: 7px;
    font-size: 12px;
    position: relative;   
    z-index: 2;
}
.divider-text:after {
    content: "";
    position: absolute;
    width: 100%;
    border-bottom: 1px solid #ddd;
    top: 55%;
    left: 0;
    z-index: 1;
}

.btn-facebook {
    background-color: #405D9D;
    color: #fff;
}
.btn-twitter {
    background-color: #42AEEC;
    color: #fff;
}
a {
  text-decoration: none;
  display: inline-block;
  padding: 10px 25px;
}

a:hover {
  background-color: #ddd;
  color: black;
}

.previous {
  background-color: #f1f1f1;
  color: black;
}

.next {
  background-color: #04AA6D;
  color: white;
}

.round {
  border-radius: 50%;
}
.center {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 500px;

}

</style>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

<!-- Google Fonts -->

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">

<!-- Bootstrap core CSS -->

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

<!-- Material Design Bootstrap -->

<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">  
</head>
<body style="font-size:17px">

<div>
<ul class="topnav" style="padding-left:50px;padding-right:30px;padding-top:0px;height:60px;">
	<li><a  style="padding-top:20px;" href="farm_home.php">Home</a></li>
	<li><a href="toolshow.php"style="padding-top:20px;">Tools</a></li>
	<li><a href="wareshow.php" style="padding-top:20px;">Warehouse</a></li>
	<li><a href="farm_contact.php" style="padding-top:20px;">Contact Us</a></li>
	<li><a class="active" href="profile.php" style="padding-top:20px;">Profile</a></li>
	<li style="float:right;padding-left:20px;padding-top:5px">
    <a  href="logout.php" class="navbar-link btn btn-info" style="text-decoration: none;font-weight: bold;color: white;height:40px;padding-top:10px">LogOut</a>
	</li>
	<li style="float:right;margin-top:0px;padding-top:10px"><img style="border-radius: 50%;float:none" src="img/<?php echo $img; ?>" alt="" width="40px" height="40px"></li>
	
</ul>
</div>
<div class="container" style="align:center">
<br>
<div  class="bootstrap">
            <ul class="nav nav-tabs" id="horizontal-list" style="font-size:20px;padding-right:40px;">
                <li ><a href="profile.php">Profile</a></li>
                <li class="active"><a href="productdetails.php?page=0">Products</a></li><br>
            </ul>
</div>

</div>
<div class="paddsection" style="height:<?php if($num>0){echo "auto";}else{echo "560px";}?>;background-color:#FFFFFF">
<center>
<?php if(isset($_GET['run']) and $_GET['run']=="success1"){?>
	<br><mark><b>Succefully Updated Product Details...</b></mark></br>
	
<?php	
}
	else if(isset($_GET['run']) and $_GET['run']=="success0"){?>
		<br><mark><b>Succefully Added To Product Details...</b></mark></br>
	<?php }
?>
<br>
<?php
	if($products->pData==false){
		echo "<center><span style='font-size:40'><b>There is no Product to show...</b></span></cenetr>";
	}
	else{
?>

<div style="border:1px solid #F5F5F5;height:520px;width:80%;border-radius:15px;box-shadow: -2px 1px #E0E0E0;background-color:#F8F8F8">
<div style=" width:10%;height:100%;float:left">
<?php
if($current!=0){?>
<div class="center">
<a href="<?php echo $previous; ?>" class="next round"><span style="font-size:50px">&#8249;</span></a>
</div>
<?php } ?>
</div>
<div style="width:10%;height:100%;float:right;">
<?php
if($current+1!=$num){?>
<div class="center">
<a href="<?php echo $next; ?>" class="next round"><span style="font-size:50px">&#8250;</span></a>
</div>
<?php } ?>
</div>
<div style="width:80%;height:100%;float:cenetr">
<div style="font-size:25px;margin-top:20px"><b>PRODUCT DETAILS</b></div><br>

<div style="width:60%;height:435px;float:left;margin-top:0px">

<form action="product_sub.php?update=1" method="post" enctype="multipart/form-data" class="Product_detail">
<input type="text" name="pid" class="form-control" id="pid" value="<?php echo $products->pData[$current]['PRODUCT_ID'];?>" placeholder="Name" style="width:100%" required minlength="4" hidden/>
<input type="text" name="fid" class="form-control" id="fid" value="<?php echo $products->pData[$current]['FARMER_ID'];?>" placeholder="Name" style="width:100%" required minlength="4" hidden/>
<br>
<table>
<tr>
<td style="width:20%;text-align:right;padding-top:6px">
<label for="pDomain" style="font-weight: bold;font-size:15px">PRODUCT DOMAIN</label>
</td>

<td style="width:80%;padding-left:10px">
<input type="text" name="pdomain" class="form-control" id="pdomain" value="<?php echo $products->pData[$current]['PRODUCT_DOMAIN'];?>" placeholder="Product Domain" style="width:100%" required minlength="4"/>
</td>
</tr>
<tr>
<td style="width:20%;text-align:right;padding-top:6px">
<label for="pDomain" style="font-weight: bold;font-size:15px">PRODUCT NAME</label>
</td>

<td style="width:80%;padding-left:10px">
<input type="text" name="pname" class="form-control" id="pname" value="<?php echo $products->pData[$current]['PRODUCT_NAME'];?>" placeholder="Product Name" style="width:100%" required minlength="4"/>
</td>
</tr>
<tr>
<td style="width:20%;text-align:right;padding-top:6px">
<label for="pDomain" style="font-weight: bold;font-size:15px">PRODUCT QUANTITY</label>
</td>

<td style="width:80%;padding-left:10px">
<input type="number" name="pquantity" class="form-control" id="pquantity" value="<?php echo $products->pData[$current]['QUANTITY'];?>" placeholder="Quantity in KG" style="width:100%" required min="100"/>
</td>
</tr>
<tr>
<td style="width:20%;text-align:right;padding-top:6px">
<label for="pDomain" style="font-weight: bold;font-size:15px">PRODUCT PRICE</label>
</td>

<td style="width:80%;padding-left:10px">
<input type="number" name="price" class="form-control" id="price" value="<?php echo $products->pData[$current]['PRICE'];?>" placeholder="Price" style="width:100%" required min="0"/>
</td>
</tr>
<tr>
<td style="width:20%;text-align:right;padding-top:6px">
<label for="pDomain" style="font-weight: bold;font-size:15px">PRODUCT DESCRIPTION</label>
</td>
<td style="width:80%;padding-left:10px">
<textarea rows = "4" cols = "50" maxlength="300" class="form-control" name = "description" placeholder="Product Description"><?php echo $products->pData[$current]['PRODUCT_DESC'];?></textarea><br>
</td>
</tr>
</table>
<input type="submit" class="btn" value="UPDATE" style="background-color:#D3D3D3;height:40px">

<input type="submit" class="btn" form="pdelete" value="DELETE PRODUCT" style="background-color:#D3D3D3;height:40px">

</form>
<form action="product_sub.php?update=2" id="pdelete" method="post" enctype="multipart/form-data" class="Product_detail">
<input type="text" name="pid1" class="form-control" id="pid" value="<?php echo $products->pData[$current]['PRODUCT_ID'];?>" placeholder="Name" style="width:100%" required minlength="4" hidden/>
</form>
</div>
<div style="width:40%;height:300px;float:right;margin-top:67px">
<br>
<img style="height:200px;width:200px" src="img/<?php echo $products->pData[$current]['PRODUCT_PHOTO'];?>" alt="<?php echo $products->pData[$current]['PRODUCT_PHOTO'];?>" width="250px" height="250px"><br>
<input type="button" id="btn1" class="btn" value="EDIT" onclick="edit()" style="background-color:#D3D3D3;height:40px">
<div id="form2" style="display:none">
<form action="setImage.php?id=1" method="post" enctype="multipart/form-data" class="Product_detail">
<input type="text" name="pid" class="form-control" id="pid" value="<?php echo $products->pData[$current]['PRODUCT_ID'];?>" placeholder="Name" style="width:100%" required minlength="4" hidden/>
<br><input type="file" name="img" class="form-control" id="img" accept="image/*" style="width:200px;border:0px" >
<input type="submit" class="btn" value="save" style="background-color:#D3D3D3;height:40px">
</form>
</div>
</div>
</div>
</div>
	<?php } ?>

<br>
<input type="button" id="addproduct" class="btn" value="ADD Product" onclick="Openform()" style="background-color:#D3D3D3;height:40px">
<br><br>
<div id="form1" style="display:none;width:30%">
<form action="product_sub.php?update=0" method="post" enctype="multipart/form-data" class="Product_detail">
<input type="text" name="fid" class="form-control" id="fid" value="<?php echo $fid;?>" placeholder="Name" style="width:100%" required minlength="4" hidden/>
<br>
<table>
<tr>
<td style="width:20%;text-align:right;padding-top:6px">
<label for="pDomain" style="font-weight: bold;font-size:15px">PRODUCT DOMAIN</label>
</td>

<td style="width:80%;padding-left:10px">
<input type="text" name="pdomain" class="form-control" id="pdomain" placeholder="Product Domain" style="width:100%" required minlength="4"/>
</td>
</tr>
<tr>
<td style="width:20%;text-align:right;padding-top:6px">
<label for="pDomain" style="font-weight: bold;font-size:15px">PRODUCT NAME</label>
</td>

<td style="width:80%;padding-left:10px">
<input type="text" name="pname" class="form-control" id="pname" placeholder="Product Name" style="width:100%" required minlength="4"/>
</td>
</tr>
<tr>
<td style="width:20%;text-align:right;padding-top:6px">
<label for="pDomain" style="font-weight: bold;font-size:15px">PRODUCT QUANTITY</label>
</td>

<td style="width:80%;padding-left:10px">
<input type="number" name="pquantity" class="form-control" id="pquantity" placeholder="Quantity in KG" style="width:100%" required min="100"/>
</td>
</tr>
<tr>
<td style="width:20%;text-align:right;padding-top:6px">
<label for="pDomain" style="font-weight: bold;font-size:15px">PRODUCT PRICE</label>
</td>

<td style="width:80%;padding-left:10px">
<input type="number" name="price" class="form-control" id="price" placeholder="Price" style="width:100%" required min="0"/>
</td>
</tr>
<tr>
<td style="width:20%;text-align:right;padding-top:6px">
<label for="pDomain" style="font-weight: bold;font-size:15px">PRODUCT DESCRIPTION</label>
</td>
<td style="width:80%;padding-left:10px">
<textarea rows = "4" cols = "50" maxlength="300" class="form-control" name = "description" placeholder="Enter Product Description" required></textarea><br>
</td>
</tr>
<tr>
<td style="width:20%;text-align:right;padding-top:6px">
<label for="pDomain" style="font-weight: bold;font-size:15px">PRODUCT IMAGE</label>
</td>

<td style="width:80%;padding-left:10px;">
<input type="file" name="img" class="form-control" id="img" accept="image/*" style="width:100%;border:0px" required />
</td>
</tr>
</table>
<input type="submit" class="btn" value="save" style="background-color:#D3D3D3;height:40px">
</form>
</div>

<script>
function back(){
	window.location.assign("profile.php");
}
function Openform()
{
    document.getElementById('addproduct').style.display = 'none';
    document.getElementById('form1').style.display = '';
}
function pdelete(){
	window.location.assign("product_sub.php?update=2");
}
function edit()
{
    document.getElementById('btn1').style.display = 'none';
	document.getElementById('form2').style.display = '';
}
</script>
</center>
</div >
<footer class="page-footer bg-dark">
<div class="bg-success">
<div class="container">
<div class="row py-4 d-flex align-items-center">
<div class="col-md-12 text-center">
<a href="#"><i class="fab fa-facebook-f white-text mr-4"> </i></a>
<a href="#"><i class="fab fa-twitter white-text mr-4"> </i></a>
<a href="#"><i class="fab fa-google-plus-g white-text mr-4"> </i></a>
<a href="#"><i class="fab fa-linkedin-in white-text mr-4"> </i></a>
<a href="#"><i class="fab fa-instagram white-text"> </i></a>
</div>
</div>
</div>
</div>
<div class="container text-center text-md-left mt-5">
<div class="row">
<div class="col-md-3 mx-auto mb-4">
<h6 class="text-uppercase font-weight-bold">About us</h6>
<hr class="bg-success mb-4 mt-0 d-inline-block mx-auto" style="width: 125px; height: 2px">
<p class="mt-2">FARM♦MART is the local source for all of your farm supply needs. From animal health, feed, seed, and pet supplies,
to fencing, farm hardware, and lawn & garden tools, your local FARM♦MART knows what you need and when you need it. Each of our 
independently owned locations has a friendly staff dedicated to serving the needs of the community and providing you with an excellent 
experience every time you visit. We pride ourselves on our expertise and excellent products at great prices.</p>
</div>
<div class="col-md-2 mx-auto mb-4">
<h6 class="text-uppercase font-weight-bold">Products</h6>
<hr class="bg-success mb-4 mt-0 d-inline-block mx-auto" style="width: 85px; height: 2px">
<ul class="list-unstyled">
<li class="my-2"><a href="#">Product Buying</a></li>
<li class="my-2"><a href="#">Product Selling</a></li>
<li class="my-2"><a href="#">Warehouse</a></li>
</ul>
</div>
<div class="col-md-2 mx-auto mb-4">
<h6 class="text-uppercase font-weight-bold">Useful links</h6>
<hr class="bg-success mb-4 mt-0 d-inline-block mx-auto" style="width: 110px; height: 2px">
<ul class="list-unstyled">
<li class="my-2"><a href="#">Home</a></li>
<li class="my-2"><a href="#">Product</a></li>
<li class="my-2"><a href="#">Warehouse</a></li>
<li class="my-2"> <a href="#">Contact Us</a></li>
</ul>
</div>
<div class="col-md-3 mx-auto mb-4">
<h6 class="text-uppercase font-weight-bold">Contact</h6>
<hr class="bg-success mb-4 mt-0 d-inline-block mx-auto" style="width: 75px; height: 2px">
<ul class="list-unstyled">
<li class="my-2"><i class="fas fa-home mr-3"></i> VIT University</li>
<li class="my-2"><i class="fas fa-envelope mr-3"></i> farmart@gmail.com</li>
<li class="my-2"><i class="fas fa-phone mr-3"></i> +919802013139</li>
<li class="my-2"><i class="fas fa-print mr-3"></i> +912345678956</li>
</ul>
</div>
</div>
</div>
<div class="footer-copyright text-center py-3">
<p>&copy; Copyright
<a href="#">Farmart.com</a></p>
<p>Designed by The Vitians</p>
</div>
</footer>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Bootstrap tooltips -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>

<!-- Bootstrap core JavaScript -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>

<!-- MDB core JavaScript -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/js/mdb.min.js"></script>

</body>
</html>