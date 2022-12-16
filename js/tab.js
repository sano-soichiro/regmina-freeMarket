const tabs = document.getElementsByClassName('tab');

for(let i = 0;i < tabs.length;i++){
    tabs[i].addEventListener('click', function(){
        
        // 初期値でついてくる「is-active」を削除
        document.getElementsByClassName('is-active')[0].classList.remove('is-active');

        // クリックした「tab」のliクラスに「is-active」を付け加える
        this.classList.add('is-active');

        // 初期値でついてくる「is-show」を削除する
        document.getElementsByClassName('is-show')[0].classList.remove('is-show');
    
        
        // 「tabs」の集まりである配列風オブジェクトを配列に変換する
        const arrayTabs = Array.prototype.slice.call(tabs);

        // クリックされた「tabs」と同じ番号に対してクラス名「is-show」を加える。
        const index = arrayTabs.indexOf(this);

        
        document.getElementsByClassName('panel')[index].classList.add('is-show');


        /* 
        ■ イベントリスナー「this」の考え方

        イベントリスナーの関数の中で「this」を使うと
        「this」の中身はイベントリスナーの対象要素と同じになる。
        
        ※ 注意 ) thisを使う際の関数はfunctionで行うこと!!
            アロー関数で使うとthisの対象物は「window」になる。
        */
       
    });
}
