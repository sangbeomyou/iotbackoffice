<!doctype html>
<?php
include "../sessions/db.php";
include "../sessions/access_all_manager.php";
?>
<html lang="ko">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
  <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
  <link rel="stylesheet" href="../assets/libs/css/style.css">
  <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
  <script src="../assets/libs/js/main-js.js"></script>
</head>

<style media="screen">
.card-body ul{
  list-style-type : none;
  margin: auto;
  padding: inherit;
}
.img {
  width: 100%;
}

.img-list {
  width: 300px;
  padding: 20px;
}

.img-item {
  border-radius: 3px;
  line-height: 32px;
  text-align: center;
  padding: 12px 7px 4px;
  display: block;
  border: 1px solid transparent;
  color: #3d405c;
  font-size: 12px;
}

.img-item img {
  width: 100%;
}

.img-item:hover {
  background-color: #fff;
  border: 1px solid #e6e6f2;
}

.img-item span {
  display: block;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}
</style>

<body>
  <!-- ============================================================== -->
  <!-- main wrapper -->
  <!-- ============================================================== -->
  <div class="dashboard-main-wrapper">
    <!-- ============================================================== -->
    <!-- navbar -->
    <!-- ============================================================== -->
    <?php
    include "../layout/header.php";
    ?>
    <!-- ============================================================== -->
    <!-- end navbar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- left sidebar -->
    <!-- ============================================================== -->
    <?php
    include "../layout/sidebar.php";
    ?>
    <!-- ============================================================== -->
    <!-- end left sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    <div class="dashboard-wrapper">
      <div class="container-fluid dashboard-content ">
        <!-- ============================================================== -->
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <?php
        include "../layout/pageheader.php";
        ?>
        <!-- ============================================================== -->
        <!-- end pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <!-- ============================================================== -->
            <!-- headings  -->
            <!-- ============================================================== -->
            <div class="card" id="headings">
              <div class="card-header">
                <?php
                $sc=$_GET['sc']; // ?????????
                $page=$_GET['page']; //????????? ??????
                $max_row=12; //????????? ??? ?????????
                if ($sc!="????????????") {?>
                  <button class="btn btn-primary" data-toggle="modal" data-target="#UPModal">?????? ?????????</button>

                  <!--?????? -->
                  <div class="modal fade" id="UPModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">???????????? ????????? ????????????</h5>
                          <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </a>
                        </div>
                        <div class="modal-body">
                          <input multiple="multiple" type="file" id="input_img" name="filename[]" accept=".gif, .jpg, .png, .jpeg, .bmp">
                          <div class="preview">

                          </div>
                        </div>
                        <div class="modal-footer">
                          <input type="button" class="btn btn-primary" data-dismiss="modal" value="????????????" onclick="submitAction();">
                          <input type="button" class="btn btn-secondary" data-dismiss="modal" value="??????">
                        </div>
                      </div>
                    </div>
                  </div><?
                }else {?>

                  <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">?????? ?????????</button>
                  <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">????????? ?????? ????????????</h5>
                          <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </a>
                        </div>
                        <div class="modal-body">
                          <div class="form-group row" >
                            <label class="col-12 col-sm-3 col-form-label text-sm-right" id="video_name">????????? Source</label>
                            <div class="col-12 col-sm-8 col-lg-6" >
                              <input type="text" name=url placeholder="????????? ?????? URL or ?????? ID?????? ???????????????." class="form-control">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">????????? ?????? ??????</label>
                            <div class="col-12 col-sm-8 col-lg-6" id="video"><!-- ?????? ?????? -->
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <input type="button" class="btn btn-primary" data-dismiss="modal" value="????????????" onclick="visubmitAction();">
                          <input type="button" class="btn btn-secondary" data-dismiss="modal" value="??????">
                        </div>
                      </div>
                    </div>
                  </div><?
                }
                ?>
                <form style="float:right;display: flex"  enctype="multipart/form-data" method="GET" action="contents_search.php">
                  <input name="mc" type="text" style="display:none" value="<?=$_GET['mc']?>">
                  <input name="sc" type="text" style="display:none" value="<?=$_GET['sc']?>">
                  <input name="page" type="text" style="display:none" value="<?=$_GET['page']?>">
                  <select name="by">
                    <option value="id">??????/ID</option>
                  </select>
                  <input class="form-control" name="search" type="text" placeholder="Search.." required>
                  <input type="submit" class="btn btn-primary" value="??????" >
                </form>
              </div>

              <div class="card-body">
                <ul class="img_ul">
                  <li class="">
                    <div class="row">
                      <?
                      $row_start=$page*$max_row-$max_row; //DB??? ?????? ????????? ??????
                      $count = $row_start+1;
                      $db = new DBC;
                      if ($sc=="????????????") {
                        $query= "SELECT idx,con_id,(SELECT id FROM member WHERE member.idx=C.user) as id,upload_date FROM contents C WHERE res_type=1 ORDER BY idx desc limit $row_start,12";
                      }else {
                        $query= "SELECT idx,con_id,(SELECT id FROM member WHERE member.idx=C.user) as id,upload_date FROM contents C WHERE res_type=2 ORDER BY idx desc limit $row_start,12";
                      }
                      $db->DBI();
                      $db->DBQ($query);
                      $db->DBE();
                      while ($list=$db->DBF()) {?>
                        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-12 "><?
                        $usage="";
                        if ($sc=="????????????") { //???????????? ????????????
                          $usage_db=new DBC;
                          $usage_query="SELECT idx FROM board_list WHERE b_state <> 4 AND con_source=1 AND content1={$list['idx']}";
                          $usage_db->DBI();
                          $usage_db->DBQ($usage_query);
                          $usage_db->DBE();
                          while ($usage_list=$usage_db->DBF()) {
                            $usage=$usage.$usage_list['idx']."|";
                          }?>
                          <a href="" class="img-item" onclick="vimodalshow(<?=$list['idx']?>,'<?=$list['con_id']?>','<?=$list['id']?>','<?=$list['upload_date']?>','<?=$usage?>')" data-toggle="modal" data-target="#viModal">
                            <img src="https://img.youtube.com/vi/<?=$list['con_id']?>/0.jpg"  class="img-thumbnail mr-0" alt="Responsive image">
                            <span><?=$list['con_id']?></span>
                          </a><?

                        }else {//??????????????? ????????????
                          $usage_db=new DBC;
                          $usage_query="SELECT * FROM board_list WHERE b_state <> 4 AND con_source=2";
                          $usage_db->DBI();
                          $usage_db->DBQ($usage_query);
                          $usage_db->DBE();
                          while ($usage_list=$usage_db->DBF()) {
                            for ($i=1; $i <= $usage_list['content_count']; $i++) {
                              if ($usage_list['content'.$i]==$list['idx']) {

                                $usage=$usage.$usage_list['idx']."|";
                              }
                            }

                          }
                          ?>

                          <a href="" class="img-item" onclick="imgmodalshow(<?=$list['idx']?>,'<?=$list['con_id']?>','<?=$list['id']?>','<?=$list['upload_date']?>','<?=$usage?>')" data-toggle="modal" data-target="#imgModal">
                            <img src="../../io/images/<?=$list['con_id']?>"  class="img-thumbnail mr-0" alt="Responsive image">
                            <span><?=$list['con_id']?></span>
                          </a>
                          <!-- Modal -->
                          <?
                        }
                        ?>

                      </div><?
                    }?>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <!-- ============================================================== -->
          <!-- end headings  -->
          <!-- ============================================================== -->
        </div>

      </div>
      <!-- ============================================================== -->
      <!-- footer -->
      <!-- ============================================================== -->
      <nav aria-label="Page navigation example" style="">
        <ul class="pagination" style="justify-content: center">
          <?
          $db = new DBC;

          $a="";
          if($_GET['by'] != ""){
            if($_GET['by'] != 4){
              $a.=" and root =".$_GET['by'];
            }
          }
          if(isset($_GET['search'])){
            $a.=" and id like '%".$_GET['search']."%'";
          }

          if ($sc=="????????????") {
            $query= "SELECT * FROM contents where res_type=1";
          }else {
            $query= "SELECT * FROM contents WHERE res_type=2";
          }
          $db->DBI();
          $db->DBQ($query);
          $db->DBE();
          $fin_num=ceil(ceil($db->resultRow()/$max_row)/5);
          $row_list_start=ceil($page/5);
          if ($page/5>1) {?>
            <li class="page-item"><a class="page-link" href="contents.php?mc=<?=$_GET['mc']?>&sc=<?=$_GET['sc']?>&page=<?=$row_list_start*5-9?>&search=<?=$_GET['search']?>" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a>
            </li><?
          }
          for ($i=$row_list_start*5-4; ($i<=$row_list_start*5)&&($i<=ceil($db->resultRow()/$max_row)); $i++) {
            if ($page==$i) {?>
              <li class="page-item active"><a class="page-link"><?=$i?></a></li><?
            }else {?>
              <li class="page-item"><a class="page-link" href="contents.php?mc=<?=$_GET['mc']?>&sc=<?=$_GET['sc']?>&page=<?=$i?>&search=<?=$_GET['search']?>"><?=$i?></a></li><?
            }
          }
          if ($row_list_start!=$fin_num) {?>
            <li class="page-item"><a class="page-link" href="contents.php?mc=<?=$_GET['mc']?>&sc=<?=$_GET['sc']?>&page=<?=$row_list_start*5+1?>&search=<?=$_GET['search']?>" aria-label="Next"><span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span></a></li><?
            }?>
          </ul>
        </nav>

    </div>
    <?php
    include "../layout/footer.php";
    ?>
    <!-- ============================================================== -->
    <!-- end footer -->
    <!-- ============================================================== -->
  </div>
</div>
<!-- ????????? ?????? -->
<div class="modal fade" id="imgModal" tabindex="-1" role="dialog" aria-labelledby="imgModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form class="modal-content" enctype="multipart/form-data" method="POST" action="../sessions/change_name.php">
      <div class="modal-header">
        <h5 class="modal-title" id="imgModalLabel">????????????</h5>
        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
      </div>
      <div class="modal-body">
        <img id="imim" style="width:100%" src="" alt="" >
        <input id="imttyp"name="type" value="2" style="display:none">
        <input id="iidx"name="idx" value="<?=$list['idx']?>" style="display:none">
        <input id="ifull" value="<?=$list['con_id']?>" style="display:none">
        <div>???????????????:
          <?
          $file_ext = substr( strrchr($list['con_id'],"."),1);
          $type = explode(".", $list['con_id']);
          $file_ext = $type[count($type)-2];

          ?>
          <input id="iorgin"name="orgin_name" value="<?=$file_ext?>" style="display:none">
          <input id="iname" name="name" type="text" value="<?=$file_ext?>" disabled required><?= $type[count($type)-1]?>
          <input name="extension" value="<?= $type[count($type)-1]?>" style="display:none">
          <a href="#"  id="ichg_" onclick="imgedit_name()" style="color:red">????????????</a>
        </div>
        <div id="iupuser"></div>
        <div id="iupload"></div>
      </div>
      <div  class="modal-footer" >
        <div id="iuseuse"></div>
        <button id="idelbutton" type="button" onclick="deleteimgcontent()" class="btn btn-primary">??????</button>
        <div id="icon_" style="display:none">
          <button type="submit" class="btn btn-primary">?????? ??????</button>
          <a href="#" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">???????????? ?????? ??????</a>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- ????????? ????????? -->
<!-- ????????? ?????? -->
<div class="modal fade" id="viModal" tabindex="-1" role="dialog" aria-labelledby="viModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form class="modal-content" enctype="multipart/form-data" method="POST" action="../sessions/change_name.php">
      <div class="modal-header">
        <h5 class="modal-title" id="viModalLabel">????????????</h5>
        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
      </div>
      <div class="modal-body">
        <iframe id="vidi" src="https://www.youtube.com/embed/<?=$list['con_id']?>?version=3&vq=hd1080" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

        <input id="full" value="" style="display:none">
        <input id="ttyp" value="1" style="display:none">
        <input id="idx" name="idx" value="" style="display:none">
        <div>
          <span id="title">?????? ID : </span>
          <input name="orgin_name" value="<?=$file_ext?>" style="display:none">
          <input id="name" name="name" type="text" value="<?=$list['con_id']?>" disabled required>
          <input name="extension" value="<?= $type[count($type)-1]?>" style="display:none">
          <a href="#"  id="chg_" onclick="viedit_name()" style="color:red">????????????</a>
        </div>

        <div id="upuser"></div>
        <div id="update"></div>
      </div>
      <div  class="modal-footer" >
        <div id="viuseuse"></div>
        <button id="videlbutton" type="button" onclick="deletevicontent()" class="btn btn-primary">??????</button>
        <div id="con_">
          <button type="submit" class="btn btn-primary">?????? ??????</button>
          <a href="#" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">???????????? ?????? ??????</a>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- ????????? ????????? -->
<!-- ============================================================== -->
<!-- end main wrapper -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
<script type="text/javascript">
function vimodalshow(idx,con_id,id,update,usage){
  $("#videlbutton").attr("style","display:none");
  $("#viuseuse").html("");
  $("#name").attr("disabled","disabled");//????????? ????????????
  $("#chg_").removeAttr("style");//???????????? ?????????
  $("#con_").attr("style","display:none");//???????????? ????????????
  if (usage=="") {
    $("#videlbutton").removeAttr("style");

  }else {
    $("#viuseuse").html("???????????? ????????? ???????????? ????????????.<br>????????? ??????: "+usage);
  }
  $("#vidi").attr("src","https://www.youtube.com/embed/"+con_id+"?version=3&vq=hd1080");//?????? ?????????
  $("#idx").val(idx);//??????IDX
  $("#upuser").html("?????? ?????? : "+id);//??????ID
  $("#update").html("?????? ??????"+update);//????????????
  $("#title").val(con_id);//????????? ????????? ??????
  $("#name").val(con_id);
  $("#full").val(con_id);
}

function imgmodalshow(idx,con_id,id,update,usage){
  $("#idelbutton").attr("style","display:none");
  $("#iuseuse").html("");
  $("#iname").attr("disabled","disabled");
  $("#ichg_").removeAttr("style");
  $("#icon_").attr("style","display:none");
  if (usage=="") {
    $("#idelbutton").removeAttr("style");

  }else {
    $("#iuseuse").html("???????????? ???????????? ???????????? ????????????.<br>????????? ??????: "+usage);
  }
  $("#imim").attr("src","../../io/images/"+con_id);
  $("#iidx").val(idx);
  $("#iupuser").html("?????? ?????? : "+id);
  $("#iupload").html("?????? ??????"+update);
  $("#iorgin").val(con_id);
  $("#ititle").val(con_id);
  $("#iname").val(con_id);
  $("#ifull").val(con_id);
}

function deleteimgcontent(){
  $.post( "../sessions/delete_contents.php", {idx:$("#iidx").val(), name:$("#ifull").val(), con:$("#imttyp").val() })
  .done(function( data ) {

    alert(data);
    location.reload();
  });
}

function deletevicontent(){
  $.post( "../sessions/delete_contents.php", {idx:$("#idx").val(), name:$("#full").val(), con:$("#ttyp").val() })
  .done(function( data ) {

    alert(data);
    location.reload();
  });
}

function viedit_name(){
  if ($("#name").attr("disabled")=='disabled') {
    $("#name").removeAttr("disabled");
    $("#name").val("");
    $("#chg_").attr("style","display:none");
    $("#con_").attr("style","");
    $("#title").html("??????URL : ");
  }
}

function imgedit_name(){
  if ($("#iname").attr("disabled")=='disabled') {
    $("#iname").removeAttr("disabled");
    $("#iname").val("");
    $("#ichg_").attr("style","display:none");
    $("#icon_").attr("style","");
  }
}

$(function () {
  // ???????????? ????????? ?????? ????????? ??????????????? ????????? ?????? ?????????


  function youtubeId(url) {
    var tag = "";
    if(url.length==11){
      tag = url;
      return tag;
    }else{
      if(url) {
        var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
        var matchs = url.match(regExp);
        if (matchs) {
          tag += matchs[7];
        }
        return tag;
      }
    }
  }
  // ???????????? ????????? ?????? ??????,??????????????? ?????????????????? ?????? ????????? ?????????
  var timer;
  $('input[name=url]').on("keyup",function(){
    if (timer) {
      clearTimeout(timer);
    }
    timer = setTimeout(function() {
      var id = youtubeId($('input[name=url]').val());
      $.ajax({
        type : 'POST',
        dataType : 'html',
        url : '../sessions/load_video.php',
        data : {video_id:id},
        success: function(data){
          // $('#video_name').html("?????? ID");
          $('input[name=url]').val(id);
          if($('input[name=url]').val()==""){
            // $('#video_name').html("?????? URL");
            $("#video").empty();
            $("#video").html("?????? URL or ID?????? <br> ??????????????????");
            $("#video").css({"color":"red","font-size":"20px"});
          }else{
            $("#video").empty();
            $("#video").append(data);
          }
        }
      });
    }, 600);
  })
});

function visubmitAction() {
  var video = $('input[name=url]').val();
  if(video.length == "11"){
    $.ajax({
      type : 'POST',
      dataType : 'html',
      url : '../sessions/save_video.php',
      data : {video:video},
      success: function(data){
        alert(data);
        location.reload();
      }
    });
  }else{
    alert("?????? URL or ID?????? ?????? ??????????????????")
  }
}





var sel_files = [];

function readURL(e) {
  sel_files=[];
  $(".preview").empty();

  var files = e.files;
  var filesArr = Array.prototype.slice.call(files);
  var index = 0;
  filesArr.forEach(function(f){
    if(!f.type.match("image.*")) {
      alert("????????? ???????????? ???????????????.");
      $(e).val("");
      exit();
    }
    var extension = f.name.substring(f.name.lastIndexOf(".")+1);
    var ck = extension.toLowerCase();
    if(ck!="bmp" && ck!="jpeg" && ck!="jpg" && ck!="png" && ck!="gif"){
      alert("bmp, jpg, jpeg, png, gif ????????? ???????????? ???????????????.");
      $(e).val("");
      exit();
    }

    var name_ck = f.name.substring(0,f.name.lastIndexOf("."));
    var big = extension.toUpperCase();
    $.ajax({
      type : 'POST',
      dataType : 'html',
      url : '../sessions/check_image.php',
      data : {name:name_ck, big:big, small:ck},
      success: function(data){
        if(data== "YES"){
          alert("?????? ????????? ?????? ????????? ?????? ????????????????????????. \n????????? ?????? ??????????????????");
          $(e).val("");
          $(".preview").empty();
          exit();
        }
      }
    });

    sel_files.push(f);
    var reader = new FileReader();
    reader.onload = function(e){
      var html = "<a href=\"javascript:void(0);\" onclick=\"deleteImageAction("+index+")\" id=\"img_id_"+index+"\"><img style='padding:5px; max-width:40%' src=\"" + e.target.result + "\" data-file='"+f.name+"' class='selProductFile' title='Click to remove'></a>";

      // var img_html = "<img style='padding:5px; max-width:40%'src=\""+e.target.result+"\"/>";
      $('.preview').append(html);
      index++;
    }
    reader.readAsDataURL(f);
  });
}

function deleteImageAction(index) {
  sel_files.splice(index, 1);

  var img_id = "#img_id_"+index;
  $(img_id).remove();
  $("#input_img").val("");
}

function submitAction() {
  var data = new FormData();

  for(var i=0, len=sel_files.length; i<len; i++) {
    var name = "image_"+i;
    data.append(name, sel_files[i]);
  }
  data.append("image_count", sel_files.length);


  var xhr = new XMLHttpRequest();
  xhr.onload = function(e) {
    if(this.status == 200) {
      alert(e.currentTarget.responseText);
      location.reload();
    }
  }
  xhr.open("POST","../sessions/save_image.php");
  xhr.send(data);
}

$(function () {
  $("#input_img").change(function() {
    return readURL(this);
  });
});
</script>

</body>

</html>
