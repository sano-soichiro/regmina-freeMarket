// 追加ボタン
$(function(){
    $('.add_btn').click(function(){
        let counter = $(".add_input").length + 1;
        $('#add_input_area').append("<div class='grouping'><div class='line'><div class='explanation'><p class='bold'></p><p class='nomal'></p></div><div class='input_space add_input' ><p class='bold'>"+counter+".見出し</p><input type='text' name='head[]' value='' class='input'><p class='bold'>"+counter+".商品説明画像</p><input type='file' name='head_img[]' value='' class='input_file'><p class='bold'>"+counter+".商品説明</p><input type='text' name='head_ex[]' value='' class='input_big'></div><input type='hidden' name='count_box[]' value=''></div></div>");
        $('.add_btn').eq(0).text("項目"+( counter + 1 )+"を追加する　＋");
    });
});

// 手数料算出
$(function(){
    $('#price').on('keyup',function(){
        let include_price = $('#price').val() * 9 / 10;
        include_price = Math.floor(include_price);
        $('#included_price').val(include_price);
    });
    $('#included_price').on('keyup',function(){
        let price = $('#included_price').val() * 10 / 9;
        price = Math.floor(price);
        $('#price').val(price);
    });
});

// 消費期限
$(function(){
    $('#run_button').click(function(){
        let harvest_date = yyyymmddToDate($('#harvest_date').val());
        let kind_id = $('#kind_id').val();
        $.ajax({
            type: "POST",
            url: "./json_encode.php",
            dataType : "json" ,
            async : false ,
            data : {kind_id:kind_id}
        }).done(function(data){
            let span = Number(data[0].time);
            harvest_date.setDate(harvest_date.getDate() + span);
            $('#experition_date').val(dateToYyyymmdd(harvest_date));
        }).fail(function(){
        });
    });
});

function yyyymmddToDate(s){
	let y = s.slice(0, 4); // YYYY
	let m = s.slice(4, 6); // MM
	let d = s.slice(6, 8); // DD
	return new Date(+y, +m - 1, d);
}

function dateToYyyymmdd(date){
	let n = date.getFullYear() * 10000; // YYYY0000
	n += date.getMonth() * 100 + 100; // YYYYMM00
	n += date.getDate(); // YYYYMMDD
	return ("000" + n).slice(-8); // 後ろから8桁を取り出す
}