$(function(){
  $('#postcode_btn').on('click', function() {
    // 入力された郵便番号でWebAPIに住所情報をリクエスト
    $.ajax({
      url: 'http://zipcloud.ibsnet.co.jp/api/search?zipcode=' + $('#zipcode').val(),
      dataType : 'jsonp',
      async : true ,
    }).done(function(data) {
      $('#city').val(data.results[0].address2);        
      $('#address').val(data.results[0].address3);
      console.log(data.results[0].address1.slice(0,-1));
      $.ajax({
        type: "POST",
        url: "./json_encode2.php",
        dataType : "json" ,
        async : true ,
        data : {prefecture:data.results[0].address1.slice(0,-1)} ,
      }).done(function(data2) {
        document.getElementById('prefecture').selectedIndex = (data2[0].id - 1);
      }).fail(function(data2) {
        alert(data2);
      });
      console.log('bbb');
    });
  });
});
