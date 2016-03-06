<style>
tr
{height:20px;}

.firsttd
{
width:15%;
background:lightblue;
}
.secondtd
{width:40%;}
</style>
 <?php		
foreach($inspectionlist as $key=>$value)
{
echo $value->inspectID;
}
?>