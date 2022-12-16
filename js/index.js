$(function() {
   // jQueryプラグイン「slick」スライダー変
   // ステップ1 (実装のみ)

   // ステップ2 (プラグイン特有の詳細設定)切替ドット/オート機能

   $('.left_list').slick({
       autoplay: true,
       speed: 3000,
       dots: true,
       asNavFor:'.right_img_list',
   });
   $('.right_img_list').slick({
      speed: 3000,
   });

});
const modalOpen2 = document.getElementById('openModal2');
const modalArea2 = document.getElementById('modalArea2');
modalOpen2.addEventListener('click', () => {
    modalArea2.classList.remove('none');
   modalArea2.classList.add('display');
});

const modalClose2 = document.getElementsByClassName('closeModal2')[0];
modalClose2.addEventListener('click',() => {
    modalArea2.classList.remove('display');
    modalArea2.classList.add('none');
 });


const modalBg2 = document.getElementsByClassName('modalBg2')[0];
modalBg2.addEventListener('click', () => {
   modalArea2.classList.remove('display');
   modalArea2.classList.add('none');
});

const tabs2 = document.getElementsByClassName('modalTabItem2');

for(let i = 0;i < tabs2.length;i++){
   tabs2[i].addEventListener('click', function(){
       
       document.getElementsByClassName('is-active')[0].classList.remove('is-active');
       this.classList.add('is-active');
       document.getElementsByClassName('is-show')[0].classList.remove('is-show');
       
       // 「tabs」の集まりである配列風オブジェクトを配列に変換する
       const arrayTabs = Array.prototype.slice.call(tabs);

       const index = arrayTabs.indexOf(this);       
       document.getElementsByClassName('modalContents')[index].classList.add('is-show');
   });
}