$('body').on('click', '.pagination a', function(e) {
    e.preventDefault();

    var url = $(this).attr('href');

    $('#table-referral-ajax').load(url+' #table-referral');

    $('html, body').animate({
        scrollTop: $("#table-referral-ajax").offset().top
    }, 500);
});

var ctr = 1;
$("#add-friend").click(function(e){
   ctr = ctr+1;
   if(ctr <= 6)
   {
     $('<div style="display:none" class="row slides"><div class="col-sm-4"><label class="required dynamic">Nama Teman Anda</label><input type="text" class="form-control" placeholder="" name="name['+ctr+']"><p class="help-block text-danger form-message" id="name.'+ctr+'"></p></div><div class="col-sm-4"><label class="required dynamic">Email Teman Anda</label><input type="text" class="form-control" placeholder="" name="email['+ctr+']"><p class="help-block text-danger form-message" id="email.'+ctr+'"></p></div><div class="col-sm-3"><label class="required dynamic">Telepon Teman Anda</label><input type="text" class="form-control" placeholder="" name="phone['+ctr+']"><p class="help-block text-danger form-message" id="phone.'+ctr+'"></p></div><div class="col-sm-1"><a><i class="fa fa-times-circle delete-row"></i></a></div></div>').appendTo($(".form-ajakteman-rows")).slideDown('fast');$(".slides").slideDown('slow');
     $(".delete-row").click(function(e){
          $(this).parent().parent().parent().slideUp('fast',function(){
              $(this).remove();    
          });
          
     });
   }
});

var regionsJSON = {"1":{"id":"1","name":"Aceh D.I.","lat":0,"lon":0,"zoom":"8"},"2":{"id":"2","name":"Bali","lat":0,"lon":0,"zoom":"8"},"3":{"id":"3","name":"Bangka Belitung","lat":0,"lon":0,"zoom":"8"},"4":{"id":"4","name":"Banten","lat":0,"lon":0,"zoom":"8"},"5":{"id":"5","name":"Bengkulu","lat":0,"lon":0,"zoom":"8"},"6":{"id":"6","name":"Gorontalo","lat":0,"lon":0,"zoom":"8"},"7":{"id":"7","name":"Jakarta D.K.I.","lat":0,"lon":0,"zoom":"8"},"8":{"id":"8","name":"Jambi","lat":0,"lon":0,"zoom":"8"},"9":{"id":"9","name":"Jawa Barat","lat":0,"lon":0,"zoom":"8"},"10":{"id":"10","name":"Jawa Tengah","lat":0,"lon":0,"zoom":"8"},"11":{"id":"11","name":"Jawa Timur","lat":0,"lon":0,"zoom":"8"},"12":{"id":"12","name":"Kalimantan Barat","lat":0,"lon":0,"zoom":"8"},"13":{"id":"13","name":"Kalimantan Selatan","lat":0,"lon":0,"zoom":"8"},"14":{"id":"14","name":"Kalimantan Tengah","lat":0,"lon":0,"zoom":"8"},"15":{"id":"15","name":"Kalimantan Timur","lat":0,"lon":0,"zoom":"8"},"35":{"id":"35","name":"Kalimantan Utara","lat":0,"lon":0,"zoom":"8"},"34":{"id":"34","name":"Kepulauan Riau","lat":0,"lon":0,"zoom":"8"},"16":{"id":"16","name":"Lampung","lat":0,"lon":0,"zoom":"8"},"17":{"id":"17","name":"Maluku","lat":0,"lon":0,"zoom":"8"},"18":{"id":"18","name":"Maluku Utara","lat":0,"lon":0,"zoom":"8"},"19":{"id":"19","name":"Nusa Tenggara Barat","lat":0,"lon":0,"zoom":"8"},"20":{"id":"20","name":"Nusa Tenggara Timur","lat":0,"lon":0,"zoom":"8"},"22":{"id":"22","name":"Papua","lat":0,"lon":0,"zoom":"8"},"21":{"id":"21","name":"Papua Barat","lat":0,"lon":0,"zoom":"8"},"24":{"id":"24","name":"Riau","lat":0,"lon":0,"zoom":"8"},"33":{"id":"33","name":"Sulawesi Barat","lat":0,"lon":0,"zoom":"8"},"25":{"id":"25","name":"Sulawesi Selatan","lat":0,"lon":0,"zoom":"8"},"26":{"id":"26","name":"Sulawesi Tengah","lat":0,"lon":0,"zoom":"8"},"27":{"id":"27","name":"Sulawesi Tenggara","lat":0,"lon":0,"zoom":"8"},"28":{"id":"28","name":"Sulawesi Utara","lat":0,"lon":0,"zoom":"8"},"29":{"id":"29","name":"Sumatra Barat","lat":0,"lon":0,"zoom":"8"},"30":{"id":"30","name":"Sumatra Selatan","lat":0,"lon":0,"zoom":"8"},"31":{"id":"31","name":"Sumatra Utara","lat":0,"lon":0,"zoom":"8"},"32":{"id":"32","name":"Yogyakarta D.I.","lat":0,"lon":0,"zoom":"8"}};
var subregionsJSON = {"82":{"id":"82","region_id":"1","name":"Aceh Barat Daya Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"81":{"id":"81","region_id":"1","name":"Aceh Barat Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"83":{"id":"83","region_id":"1","name":"Aceh Besar Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"84":{"id":"84","region_id":"1","name":"Aceh Jaya Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"85":{"id":"85","region_id":"1","name":"Aceh Selatan Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"86":{"id":"86","region_id":"1","name":"Aceh Singkil Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"87":{"id":"87","region_id":"1","name":"Aceh Tamiang Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"88":{"id":"88","region_id":"1","name":"Aceh Tengah Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"89":{"id":"89","region_id":"1","name":"Aceh Tenggara Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"90":{"id":"90","region_id":"1","name":"Aceh Timur Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"91":{"id":"91","region_id":"1","name":"Aceh Utara Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"137":{"id":"137","region_id":"29","name":"Agam Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"415":{"id":"415","region_id":"20","name":"Alor Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"479":{"id":"479","region_id":"17","name":"Ambon Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"104":{"id":"104","region_id":"31","name":"Asahan Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"440":{"id":"440","region_id":"22","name":"Asmat Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"217":{"id":"217","region_id":"2","name":"Badung Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"254":{"id":"254","region_id":"13","name":"Balanngan Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"250":{"id":"250","region_id":"15","name":"Balikpapan Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"99":{"id":"99","region_id":"1","name":"Banda Aceh Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"382":{"id":"382","region_id":"16","name":"Bandar Lampung Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"2":{"id":"2","region_id":"9","name":"Bandung Barat Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"1":{"id":"1","region_id":"9","name":"Bandung Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"18":{"id":"18","region_id":"9","name":"Bandung Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"310":{"id":"310","region_id":"26","name":"Banggai Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"311":{"id":"311","region_id":"26","name":"Banggai Kepulauan Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"395":{"id":"395","region_id":"3","name":"Bangka Barat Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"394":{"id":"394","region_id":"3","name":"Bangka Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"396":{"id":"396","region_id":"3","name":"Bangka Selatan Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"397":{"id":"397","region_id":"3","name":"Bangka Tengah Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"179":{"id":"179","region_id":"11","name":"Bangkalan  Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"218":{"id":"218","region_id":"2","name":"Bangli Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"255":{"id":"255","region_id":"13","name":"Banjar Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"19":{"id":"19","region_id":"9","name":"Banjar Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"265":{"id":"265","region_id":"13","name":"Banjarbaru Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"266":{"id":"266","region_id":"13","name":"Banjarmasin Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"33":{"id":"33","region_id":"10","name":"Banjarnegara Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"286":{"id":"286","region_id":"25","name":"Bantaeng Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"68":{"id":"68","region_id":"32","name":"Bantul Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"355":{"id":"355","region_id":"30","name":"Banyuasin Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"34":{"id":"34","region_id":"10","name":"Banyumas Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"180":{"id":"180","region_id":"11","name":"Banyuwangi  Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"256":{"id":"256","region_id":"13","name":"Barito Kuala Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"226":{"id":"226","region_id":"14","name":"Barito Selatan Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"227":{"id":"227","region_id":"14","name":"Barito Timur Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"228":{"id":"228","region_id":"14","name":"Barito Utara Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"287":{"id":"287","region_id":"25","name":"Barru Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"406":{"id":"406","region_id":"34","name":"Batam Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"168":{"id":"168","region_id":"8","name":"Batang Hari Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"35":{"id":"35","region_id":"10","name":"Batang Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"208":{"id":"208","region_id":"11","name":"Batu Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"105":{"id":"105","region_id":"31","name":"Batubara Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"331":{"id":"331","region_id":"27","name":"Bau-Bau Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"3":{"id":"3","region_id":"9","name":"Bekasi Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"20":{"id":"20","region_id":"9","name":"Bekasi Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"398":{"id":"398","region_id":"3","name":"Belitung Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"399":{"id":"399","region_id":"3","name":"Belitung Timur Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"416":{"id":"416","region_id":"20","name":"Belu Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"92":{"id":"92","region_id":"1","name":"Bener Meriah Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"156":{"id":"156","region_id":"24","name":"Bengkalis Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"267":{"id":"267","region_id":"12","name":"Bengkayang Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"393":{"id":"393","region_id":"5","name":"Bengkulu Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"384":{"id":"384","region_id":"5","name":"Bengkulu Selatan Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"385":{"id":"385","region_id":"5","name":"Bengkulu Tengah Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"386":{"id":"386","region_id":"5","name":"Bengkulu Utara Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"240":{"id":"240","region_id":"15","name":"Berau Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"441":{"id":"441","region_id":"22","name":"Biak Numfor Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"431":{"id":"431","region_id":"19","name":"Bima Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"430":{"id":"430","region_id":"19","name":"Bima Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"129":{"id":"129","region_id":"31","name":"Binjai Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"401":{"id":"401","region_id":"34","name":"Bintan Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"93":{"id":"93","region_id":"1","name":"Bireuen Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"344":{"id":"344","region_id":"28","name":"Bitung Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"345":{"id":"345","region_id":"28","name":"Bitung Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"181":{"id":"181","region_id":"11","name":"Blitar Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"209":{"id":"209","region_id":"11","name":"Blitar Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"36":{"id":"36","region_id":"10","name":"Blora Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"349":{"id":"349","region_id":"6","name":"Boalemo Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"4":{"id":"4","region_id":"9","name":"Bogor Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"21":{"id":"21","region_id":"9","name":"Bogor Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"182":{"id":"182","region_id":"11","name":"Bojonegoro Kab. ","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"333":{"id":"333","region_id":"28","name":"Bolaang Mongondow Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"334":{"id":"334","region_id":"28","name":"Bolaang Mongondow Selatan Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"335":{"id":"335","region_id":"28","name":"Bolaang Mongondow Timur Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"336":{"id":"336","region_id":"28","name":"Bolaang Mongondow Utara Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"321":{"id":"321","region_id":"27","name":"Bombana Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"183":{"id":"183","region_id":"11","name":"Bondowoso Kab. ","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"350":{"id":"350","region_id":"6","name":"Bone Bolango Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"288":{"id":"288","region_id":"25","name":"Bone Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"251":{"id":"251","region_id":"15","name":"Bontang Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"442":{"id":"442","region_id":"22","name":"Boven Digoel Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"37":{"id":"37","region_id":"10","name":"Boyolali Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"38":{"id":"38","region_id":"10","name":"Brebes Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"149":{"id":"149","region_id":"29","name":"Bukittinggi Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"219":{"id":"219","region_id":"2","name":"Buleleng Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"289":{"id":"289","region_id":"25","name":"Bulukumba Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"241":{"id":"241","region_id":"35","name":"Bulungan Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"169":{"id":"169","region_id":"8","name":"Bungo Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"312":{"id":"312","region_id":"26","name":"Buol Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"480":{"id":"480","region_id":"17","name":"Buru Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"481":{"id":"481","region_id":"17","name":"Buru Selatan Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"322":{"id":"322","region_id":"27","name":"Buton Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"323":{"id":"323","region_id":"27","name":"Buton Utara Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"5":{"id":"5","region_id":"9","name":"Ciamis Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"6":{"id":"6","region_id":"9","name":"Cianjur Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"39":{"id":"39","region_id":"10","name":"Cilacap Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"77":{"id":"77","region_id":"4","name":"Cilegon Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"22":{"id":"22","region_id":"9","name":"Cimahi Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"7":{"id":"7","region_id":"9","name":"Cirebon Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"23":{"id":"23","region_id":"9","name":"Cirebon Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"106":{"id":"106","region_id":"31","name":"Dairi Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"443":{"id":"443","region_id":"22","name":"Deiyai Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"107":{"id":"107","region_id":"31","name":"Deli Serdang Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"40":{"id":"40","region_id":"10","name":"Demak Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"225":{"id":"225","region_id":"2","name":"Denpasar Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"24":{"id":"24","region_id":"9","name":"Depok Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"138":{"id":"138","region_id":"29","name":"Dharmasraya Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"444":{"id":"444","region_id":"22","name":"Dogiyai Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"432":{"id":"432","region_id":"19","name":"Dompu Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"313":{"id":"313","region_id":"26","name":"Donggala Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"166":{"id":"166","region_id":"24","name":"Dumai Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"356":{"id":"356","region_id":"30","name":"Empat Lawang Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"412":{"id":"412","region_id":"20","name":"Ende Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"290":{"id":"290","region_id":"25","name":"Enrekang Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"469":{"id":"469","region_id":"21","name":"Fakfak Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"414":{"id":"414","region_id":"20","name":"Flores Timur Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"8":{"id":"8","region_id":"9","name":"Garut Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"94":{"id":"94","region_id":"1","name":"Gayo Lues Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"220":{"id":"220","region_id":"2","name":"Gianyar Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"351":{"id":"351","region_id":"6","name":"Gorontalo Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"354":{"id":"354","region_id":"6","name":"Gorontalo Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"352":{"id":"352","region_id":"6","name":"Gorontalo Utara Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"291":{"id":"291","region_id":"25","name":"Gowa Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"184":{"id":"184","region_id":"11","name":"Gresik Kab. ","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"41":{"id":"41","region_id":"10","name":"Grobogan Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"69":{"id":"69","region_id":"32","name":"Gunung Kidul Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"229":{"id":"229","region_id":"14","name":"Gunung Mas Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"130":{"id":"130","region_id":"31","name":"Gunung Sitoli Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"491":{"id":"491","region_id":"18","name":"Halmahera Barat Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"492":{"id":"492","region_id":"18","name":"Halmahera Selatan Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"493":{"id":"493","region_id":"18","name":"Halmahera Tengah Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"494":{"id":"494","region_id":"18","name":"Halmahera Timur Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"495":{"id":"495","region_id":"18","name":"Halmahera Utara Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"257":{"id":"257","region_id":"13","name":"Hulu Sungai Selatan Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"258":{"id":"258","region_id":"13","name":"Hulu Sungai Tengah Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"259":{"id":"259","region_id":"13","name":"Hulu Sungai Utara Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"108":{"id":"108","region_id":"31","name":"Humbang Hasundutan Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"157":{"id":"157","region_id":"24","name":"Indragiri Hilir Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"158":{"id":"158","region_id":"24","name":"Indragiri Hulu Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"9":{"id":"9","region_id":"9","name":"Indramayu Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"445":{"id":"445","region_id":"22","name":"Intan Jaya Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"28":{"id":"28","region_id":"7","name":"Jakarta Barat","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"29":{"id":"29","region_id":"7","name":"Jakarta Pusat","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"30":{"id":"30","region_id":"7","name":"Jakarta Selatan","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"31":{"id":"31","region_id":"7","name":"Jakarta Timur","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"32":{"id":"32","region_id":"7","name":"Jakarta Utara","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"177":{"id":"177","region_id":"8","name":"Jambi Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"446":{"id":"446","region_id":"22","name":"Jayapura Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"439":{"id":"439","region_id":"22","name":"Jayapura Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"447":{"id":"447","region_id":"22","name":"Jayawijaya Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"185":{"id":"185","region_id":"11","name":"Jember Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"221":{"id":"221","region_id":"2","name":"Jembrana Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"292":{"id":"292","region_id":"25","name":"Jenepronto Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"42":{"id":"42","region_id":"10","name":"Jepara Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"186":{"id":"186","region_id":"11","name":"Jombang  Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"470":{"id":"470","region_id":"21","name":"Kaimana Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"159":{"id":"159","region_id":"24","name":"Kampar Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"268":{"id":"268","region_id":"12","name":"Kapuas Hulu Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"230":{"id":"230","region_id":"14","name":"Kapuas Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"43":{"id":"43","region_id":"10","name":"Karanganyar Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"222":{"id":"222","region_id":"2","name":"Karangasem Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"499":{"id":"499","region_id":"9","name":"Karawang Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"402":{"id":"402","region_id":"34","name":"Karimun Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"109":{"id":"109","region_id":"31","name":"Karo Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"231":{"id":"231","region_id":"14","name":"Katingan Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"387":{"id":"387","region_id":"5","name":"Kaur Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"269":{"id":"269","region_id":"12","name":"Kayong Utara Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"44":{"id":"44","region_id":"10","name":"Kebumen Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"187":{"id":"187","region_id":"11","name":"Kediri  Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"210":{"id":"210","region_id":"11","name":"Kediri Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"448":{"id":"448","region_id":"22","name":"Keerom Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"45":{"id":"45","region_id":"10","name":"Kendal Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"332":{"id":"332","region_id":"27","name":"Kendari Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"388":{"id":"388","region_id":"5","name":"Kepahiang Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"403":{"id":"403","region_id":"34","name":"Kepulauan Anambas Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"482":{"id":"482","region_id":"17","name":"Kepulauan Aru Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"140":{"id":"140","region_id":"29","name":"Kepulauan Mentawai Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"160":{"id":"160","region_id":"24","name":"Kepulauan Meranti Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"337":{"id":"337","region_id":"28","name":"Kepulauan Sangihe Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"293":{"id":"293","region_id":"25","name":"Kepulauan Selayar Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"27":{"id":"27","region_id":"7","name":"Kepulauan Seribu","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"338":{"id":"338","region_id":"28","name":"Kepulauan Siau Tagulandang Biaro Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"339":{"id":"339","region_id":"28","name":"Kepulauan Talaud Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"496":{"id":"496","region_id":"18","name":"Kepuluan Sula Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"10":{"id":"10","region_id":"9","name":"Kerawang Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"170":{"id":"170","region_id":"8","name":"Kerinci Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"270":{"id":"270","region_id":"12","name":"Ketapang Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"46":{"id":"46","region_id":"10","name":"Klaten Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"223":{"id":"223","region_id":"2","name":"Klungkung Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"324":{"id":"324","region_id":"27","name":"Kolaka Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"325":{"id":"325","region_id":"27","name":"Kolaka Utara Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"326":{"id":"326","region_id":"27","name":"Konawe Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"327":{"id":"327","region_id":"27","name":"Konawe Selatan Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"328":{"id":"328","region_id":"27","name":"Konawe Utara Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"260":{"id":"260","region_id":"13","name":"Kotabaru Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"346":{"id":"346","region_id":"28","name":"Kotamobagu Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"232":{"id":"232","region_id":"14","name":"Kotawaringin Barat Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"233":{"id":"233","region_id":"14","name":"Kotawaringin Timur Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"161":{"id":"161","region_id":"24","name":"Kuantan Singingi Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"271":{"id":"271","region_id":"12","name":"Kubu Raya Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"47":{"id":"47","region_id":"10","name":"Kudus Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"70":{"id":"70","region_id":"32","name":"Kulon Progo Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"11":{"id":"11","region_id":"9","name":"Kuningan Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"410":{"id":"410","region_id":"20","name":"Kupang Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"411":{"id":"411","region_id":"20","name":"Kupang Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"242":{"id":"242","region_id":"15","name":"Kutai Barat Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"243":{"id":"243","region_id":"15","name":"Kutai Kartanegara Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"244":{"id":"244","region_id":"15","name":"Kutai Timur Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"110":{"id":"110","region_id":"31","name":"Labuhanbatu Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"111":{"id":"111","region_id":"31","name":"Labuhanbatu Selatan Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"112":{"id":"112","region_id":"31","name":"Labuhanbatu Utara Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"357":{"id":"357","region_id":"30","name":"Lahat Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"234":{"id":"234","region_id":"14","name":"Lamandau Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"188":{"id":"188","region_id":"11","name":"Lamongan  Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"370":{"id":"370","region_id":"16","name":"Lampung Barat Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"371":{"id":"371","region_id":"16","name":"Lampung Selatan Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"372":{"id":"372","region_id":"16","name":"Lampung Tengah Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"373":{"id":"373","region_id":"16","name":"Lampung Timur Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"374":{"id":"374","region_id":"16","name":"Lampung Utara Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"272":{"id":"272","region_id":"12","name":"Landak Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"113":{"id":"113","region_id":"31","name":"Langkat Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"100":{"id":"100","region_id":"1","name":"Langsa Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"449":{"id":"449","region_id":"22","name":"Lanny Jaya Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"73":{"id":"73","region_id":"4","name":"Lebak Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"389":{"id":"389","region_id":"5","name":"Lebong Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"428":{"id":"428","region_id":"20","name":"Lembata Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"101":{"id":"101","region_id":"1","name":"Lhokseumawe Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"139":{"id":"139","region_id":"29","name":"Lima Puluh Kota Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"404":{"id":"404","region_id":"34","name":"Lingga Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"433":{"id":"433","region_id":"19","name":"Lombok Barat Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"434":{"id":"434","region_id":"19","name":"Lombok Tengah Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"435":{"id":"435","region_id":"19","name":"Lombok Timur Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"436":{"id":"436","region_id":"19","name":"Lombok Utara Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"366":{"id":"366","region_id":"30","name":"Lubuklinggau Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"189":{"id":"189","region_id":"11","name":"Lumajang Kab. ","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"294":{"id":"294","region_id":"25","name":"Luwu Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"295":{"id":"295","region_id":"25","name":"Luwu Timur Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"296":{"id":"296","region_id":"25","name":"Luwu Utara Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"190":{"id":"190","region_id":"11","name":"Madiun Kab. ","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"211":{"id":"211","region_id":"11","name":"Madiun Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"48":{"id":"48","region_id":"10","name":"Magelang Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"62":{"id":"62","region_id":"10","name":"Magelang Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"191":{"id":"191","region_id":"11","name":"Magetan Kab. ","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"12":{"id":"12","region_id":"9","name":"Majalengka Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"501":{"id":"501","region_id":"33","name":"Majene","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"281":{"id":"281","region_id":"23","name":"Majene Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"307":{"id":"307","region_id":"25","name":"Makassar Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"192":{"id":"192","region_id":"11","name":"Malang Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"212":{"id":"212","region_id":"11","name":"Malang Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"245":{"id":"245","region_id":"35","name":"Malinau Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"483":{"id":"483","region_id":"17","name":"Maluku Barat Daya Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"484":{"id":"484","region_id":"17","name":"Maluku Tengah Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"486":{"id":"486","region_id":"17","name":"Maluku Tenggara Barat Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"485":{"id":"485","region_id":"17","name":"Maluku Tenggara Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"502":{"id":"502","region_id":"33","name":"Mamasa","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"282":{"id":"282","region_id":"23","name":"Mamasa Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"450":{"id":"450","region_id":"22","name":"Mamberamo Raya Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"451":{"id":"451","region_id":"22","name":"Mamberamo Tengah Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"503":{"id":"503","region_id":"33","name":"Mamuju","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"283":{"id":"283","region_id":"23","name":"Mamuju Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"504":{"id":"504","region_id":"33","name":"Mamuju Utara","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"284":{"id":"284","region_id":"23","name":"Mamuju Utara Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"347":{"id":"347","region_id":"28","name":"Manado Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"114":{"id":"114","region_id":"31","name":"Mandailing Natal Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"426":{"id":"426","region_id":"20","name":"Manggarai  Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"425":{"id":"425","region_id":"20","name":"Manggarai Barat Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"427":{"id":"427","region_id":"20","name":"Manggarai Timur Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"471":{"id":"471","region_id":"21","name":"Manokwari Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"452":{"id":"452","region_id":"22","name":"Mappi Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"297":{"id":"297","region_id":"25","name":"Maros Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"429":{"id":"429","region_id":"19","name":"Mataram Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"472":{"id":"472","region_id":"21","name":"Maybrat Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"131":{"id":"131","region_id":"31","name":"Medan Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"273":{"id":"273","region_id":"12","name":"Melawi Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"171":{"id":"171","region_id":"8","name":"Merangin Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"453":{"id":"453","region_id":"22","name":"Merauke Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"375":{"id":"375","region_id":"16","name":"Mesuji Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"383":{"id":"383","region_id":"16","name":"Metro Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"454":{"id":"454","region_id":"22","name":"Mimika Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"340":{"id":"340","region_id":"28","name":"Minahasa Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"341":{"id":"341","region_id":"28","name":"Minahasa Selatan Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"342":{"id":"342","region_id":"28","name":"Minahasa Tenggara Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"343":{"id":"343","region_id":"28","name":"Minahasa Utara Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"193":{"id":"193","region_id":"11","name":"Mojokerto Kab. ","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"213":{"id":"213","region_id":"11","name":"Mojokerto Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"314":{"id":"314","region_id":"26","name":"Morowali Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"358":{"id":"358","region_id":"30","name":"Muara Enim Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"172":{"id":"172","region_id":"8","name":"Muaro Jambi Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"390":{"id":"390","region_id":"5","name":"Mukomuko Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"329":{"id":"329","region_id":"27","name":"Muna Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"235":{"id":"235","region_id":"14","name":"Murung Raya Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"359":{"id":"359","region_id":"30","name":"Musi Banyuasin Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"360":{"id":"360","region_id":"30","name":"Musi Rawas Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"455":{"id":"455","region_id":"22","name":"Nabire Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"95":{"id":"95","region_id":"1","name":"Nagan Raya Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"409":{"id":"409","region_id":"20","name":"Nagekeo Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"405":{"id":"405","region_id":"34","name":"Natuna Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"456":{"id":"456","region_id":"22","name":"Nduga Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"408":{"id":"408","region_id":"20","name":"Ngada Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"194":{"id":"194","region_id":"11","name":"Nganjuk Kab. ","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"195":{"id":"195","region_id":"11","name":"Ngawi Kab. ","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"116":{"id":"116","region_id":"31","name":"Nias Barat Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"115":{"id":"115","region_id":"31","name":"Nias Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"117":{"id":"117","region_id":"31","name":"Nias Selatan Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"118":{"id":"118","region_id":"31","name":"Nias Utara Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"246":{"id":"246","region_id":"35","name":"Nunukan Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"361":{"id":"361","region_id":"30","name":"Ogan Ilir Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"362":{"id":"362","region_id":"30","name":"Ogan Komering Ilir Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"363":{"id":"363","region_id":"30","name":"Ogan Komering Ulu Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"364":{"id":"364","region_id":"30","name":"Ogan Komering Ulu Selatan Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"365":{"id":"365","region_id":"30","name":"Ogan Komering Ulu Timur Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"196":{"id":"196","region_id":"11","name":"Pacitan Kab. ","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"150":{"id":"150","region_id":"29","name":"Padang Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"119":{"id":"119","region_id":"31","name":"Padang Lawas Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"120":{"id":"120","region_id":"31","name":"Padang Lawas Utara Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"151":{"id":"151","region_id":"29","name":"Padang Panjang Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"141":{"id":"141","region_id":"29","name":"Padang Pariaman Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"132":{"id":"132","region_id":"31","name":"Padang Sidempuan Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"367":{"id":"367","region_id":"30","name":"Pagar Alam Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"121":{"id":"121","region_id":"31","name":"Pakpak Bharat Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"239":{"id":"239","region_id":"14","name":"Palangkaraya Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"368":{"id":"368","region_id":"30","name":"Palembang Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"308":{"id":"308","region_id":"25","name":"Palopo Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"320":{"id":"320","region_id":"26","name":"Palu Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"197":{"id":"197","region_id":"11","name":"Pamekasan Kab. ","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"498":{"id":"498","region_id":"4","name":"Pandeglang Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"298":{"id":"298","region_id":"25","name":"Pangkajene dan Kepulauan Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"400":{"id":"400","region_id":"3","name":"Pangkal Pinang Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"457":{"id":"457","region_id":"22","name":"Paniai Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"309":{"id":"309","region_id":"25","name":"Pare-Pare Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"152":{"id":"152","region_id":"29","name":"Pariaman Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"315":{"id":"315","region_id":"26","name":"Parigi Moutong Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"143":{"id":"143","region_id":"29","name":"Pasaman Barat Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"142":{"id":"142","region_id":"29","name":"Pasaman Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"247":{"id":"247","region_id":"15","name":"Paser Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"198":{"id":"198","region_id":"11","name":"Pasuruan Kab. ","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"214":{"id":"214","region_id":"11","name":"Pasuruan Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"49":{"id":"49","region_id":"10","name":"Pati Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"153":{"id":"153","region_id":"29","name":"Payakumbuh Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"50":{"id":"50","region_id":"10","name":"Pekalongan Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"63":{"id":"63","region_id":"10","name":"Pekalongan Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"167":{"id":"167","region_id":"24","name":"Pekanbaru Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"162":{"id":"162","region_id":"24","name":"Pelalawan Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"51":{"id":"51","region_id":"10","name":"Pemalang Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"133":{"id":"133","region_id":"31","name":"Pematangsiantar Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"248":{"id":"248","region_id":"15","name":"Penajam Paser Utara Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"74":{"id":"74","region_id":"4","name":"Pendeglang Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"458":{"id":"458","region_id":"22","name":"Pengunungan Bintang Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"376":{"id":"376","region_id":"16","name":"Pesawaran Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"144":{"id":"144","region_id":"29","name":"Pesisir Selatan Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"97":{"id":"97","region_id":"1","name":"Pidie Jaya Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"96":{"id":"96","region_id":"1","name":"Pidie Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"299":{"id":"299","region_id":"25","name":"Pinrang Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"353":{"id":"353","region_id":"6","name":"Pohuwato Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"505":{"id":"505","region_id":"33","name":"Polewali Mandar","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"285":{"id":"285","region_id":"23","name":"Polewali Mandar Kab. ","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"199":{"id":"199","region_id":"11","name":"Ponorogo Kab. ","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"274":{"id":"274","region_id":"12","name":"Pontianak Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"279":{"id":"279","region_id":"12","name":"Pontianak Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"316":{"id":"316","region_id":"26","name":"Poso Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"369":{"id":"369","region_id":"30","name":"Prabumulih Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"377":{"id":"377","region_id":"16","name":"Pringsewu Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"200":{"id":"200","region_id":"11","name":"Probolinggo Kab. ","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"215":{"id":"215","region_id":"11","name":"Probolinggo Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"236":{"id":"236","region_id":"14","name":"Pulang Pisau Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"497":{"id":"497","region_id":"18","name":"Pulau Morotai Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"460":{"id":"460","region_id":"22","name":"Puncak Jaya Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"459":{"id":"459","region_id":"22","name":"Puncak Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"52":{"id":"52","region_id":"10","name":"Purbalingga Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"13":{"id":"13","region_id":"9","name":"Purwakarta Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"53":{"id":"53","region_id":"10","name":"Purworejo Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"473":{"id":"473","region_id":"21","name":"Raja Ampat Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"391":{"id":"391","region_id":"5","name":"Rejang Lebong Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"54":{"id":"54","region_id":"10","name":"Rembang Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"164":{"id":"164","region_id":"24","name":"Rokan Hilir Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"163":{"id":"163","region_id":"24","name":"Rokan Hulu Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"419":{"id":"419","region_id":"20","name":"Rote Ndao Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"102":{"id":"102","region_id":"1","name":"Sabang Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"420":{"id":"420","region_id":"20","name":"Sabu Raijua Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"64":{"id":"64","region_id":"10","name":"Salatiga Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"252":{"id":"252","region_id":"15","name":"Samarinda Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"275":{"id":"275","region_id":"12","name":"Sambas Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"122":{"id":"122","region_id":"31","name":"Samosir Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"201":{"id":"201","region_id":"11","name":"Sampang Kab. ","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"276":{"id":"276","region_id":"12","name":"Sanggau Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"461":{"id":"461","region_id":"22","name":"Sarmi Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"173":{"id":"173","region_id":"8","name":"Sarolangun Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"154":{"id":"154","region_id":"29","name":"Sawahlunto Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"277":{"id":"277","region_id":"12","name":"Sekadau Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"392":{"id":"392","region_id":"5","name":"Seluma Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"55":{"id":"55","region_id":"10","name":"Semarang Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"65":{"id":"65","region_id":"10","name":"Semarang Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"487":{"id":"487","region_id":"17","name":"Seram Bagian Barat Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"488":{"id":"488","region_id":"17","name":"Seram Bagian Timur Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"75":{"id":"75","region_id":"4","name":"Serang Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"78":{"id":"78","region_id":"4","name":"Serang Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"123":{"id":"123","region_id":"31","name":"Serdang Bedagai Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"238":{"id":"238","region_id":"14","name":"Seruyan Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"165":{"id":"165","region_id":"24","name":"Siak Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"134":{"id":"134","region_id":"31","name":"Sibolga Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"300":{"id":"300","region_id":"25","name":"Sidenreng Rappang Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"202":{"id":"202","region_id":"11","name":"Sidoarjo  Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"319":{"id":"319","region_id":"26","name":"Sigi Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"145":{"id":"145","region_id":"29","name":"Sijunjung Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"413":{"id":"413","region_id":"20","name":"Sikka Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"124":{"id":"124","region_id":"31","name":"Simalungun Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"98":{"id":"98","region_id":"1","name":"Simeulue Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"280":{"id":"280","region_id":"12","name":"Singkawang Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"301":{"id":"301","region_id":"25","name":"Sinjai Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"278":{"id":"278","region_id":"12","name":"Sintang Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"203":{"id":"203","region_id":"11","name":"Situbondo Kab. ","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"71":{"id":"71","region_id":"32","name":"Sleman Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"146":{"id":"146","region_id":"29","name":"Solok Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"155":{"id":"155","region_id":"29","name":"Solok Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"147":{"id":"147","region_id":"29","name":"Solok Selatan Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"302":{"id":"302","region_id":"25","name":"Soppeng Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"474":{"id":"474","region_id":"21","name":"Sorong Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"468":{"id":"468","region_id":"21","name":"Sorong Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"475":{"id":"475","region_id":"21","name":"Sorong Selatan Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"56":{"id":"56","region_id":"10","name":"Sragen Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"14":{"id":"14","region_id":"9","name":"Subang Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"103":{"id":"103","region_id":"1","name":"Subulussalam Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"15":{"id":"15","region_id":"9","name":"Sukabumi Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"25":{"id":"25","region_id":"9","name":"Sukabumi Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"237":{"id":"237","region_id":"14","name":"Sukamara Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"57":{"id":"57","region_id":"10","name":"Sukoharjo Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"421":{"id":"421","region_id":"20","name":"Sumba Barat Daya Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"422":{"id":"422","region_id":"20","name":"Sumba Barat Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"423":{"id":"423","region_id":"20","name":"Sumba Tengah Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"424":{"id":"424","region_id":"20","name":"Sumba Timur Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"438":{"id":"438","region_id":"19","name":"Sumbawa Barat Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"437":{"id":"437","region_id":"19","name":"Sumbawa Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"16":{"id":"16","region_id":"9","name":"Sumedang Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"204":{"id":"204","region_id":"11","name":"Sumenep Kab. ","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"178":{"id":"178","region_id":"8","name":"Sungai Penuh Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"462":{"id":"462","region_id":"22","name":"Supiori Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"216":{"id":"216","region_id":"11","name":"Surabaya Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"66":{"id":"66","region_id":"10","name":"Surakarta Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"261":{"id":"261","region_id":"13","name":"Tabalong Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"224":{"id":"224","region_id":"2","name":"Tabanan Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"303":{"id":"303","region_id":"25","name":"Takalar Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"476":{"id":"476","region_id":"21","name":"Tambrauw Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"249":{"id":"249","region_id":"35","name":"Tana Tidung Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"304":{"id":"304","region_id":"25","name":"Tana Toraja Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"262":{"id":"262","region_id":"13","name":"Tanah Bumbu Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"148":{"id":"148","region_id":"29","name":"Tanah Datar Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"263":{"id":"263","region_id":"13","name":"Tanah Laut Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"76":{"id":"76","region_id":"4","name":"Tangerang Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"79":{"id":"79","region_id":"4","name":"Tangerang Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"80":{"id":"80","region_id":"4","name":"Tangerang Selatan Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"378":{"id":"378","region_id":"16","name":"Tanggamus Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"135":{"id":"135","region_id":"31","name":"Tanjung Balai Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"174":{"id":"174","region_id":"8","name":"Tanjung Jabung Barat Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"175":{"id":"175","region_id":"8","name":"Tanjung Jabung Timur Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"407":{"id":"407","region_id":"34","name":"Tanjung Pinang Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"125":{"id":"125","region_id":"31","name":"Tapanuli Selatan Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"126":{"id":"126","region_id":"31","name":"Tapanuli Tengah Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"127":{"id":"127","region_id":"31","name":"Tapanuli Utara Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"264":{"id":"264","region_id":"13","name":"Tapin  Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"253":{"id":"253","region_id":"35","name":"Tarakan Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"17":{"id":"17","region_id":"9","name":"Tasikmalaya Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"26":{"id":"26","region_id":"9","name":"Tasikmalaya Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"136":{"id":"136","region_id":"31","name":"Tebing Tinggi Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"176":{"id":"176","region_id":"8","name":"Tebo Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"58":{"id":"58","region_id":"10","name":"Tegal Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"67":{"id":"67","region_id":"10","name":"Tegal Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"477":{"id":"477","region_id":"21","name":"Teluk Bintuni Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"478":{"id":"478","region_id":"21","name":"Teluk Wondama Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"59":{"id":"59","region_id":"10","name":"Temanggung Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"489":{"id":"489","region_id":"18","name":"Ternate Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"490":{"id":"490","region_id":"18","name":"Tidore Kepulauan Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"418":{"id":"418","region_id":"20","name":"Timor Tengah Selatan Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"417":{"id":"417","region_id":"20","name":"Timor Tengah Utara Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"128":{"id":"128","region_id":"31","name":"Toba Samosir Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"317":{"id":"317","region_id":"26","name":"Tojo Una-una Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"318":{"id":"318","region_id":"26","name":"Toli-Toli Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"463":{"id":"463","region_id":"22","name":"Tolikara Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"348":{"id":"348","region_id":"28","name":"Tomohon Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"305":{"id":"305","region_id":"25","name":"Toraja Utara Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"205":{"id":"205","region_id":"11","name":"Trenggalek Kab. ","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"500":{"id":"500","region_id":"17","name":"Tual Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"206":{"id":"206","region_id":"11","name":"Tuban Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"380":{"id":"380","region_id":"16","name":"Tulang Bawang Barat Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"379":{"id":"379","region_id":"16","name":"Tulang Bawang Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"207":{"id":"207","region_id":"11","name":"Tulungagung Kab. ","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"306":{"id":"306","region_id":"25","name":"Wajo Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"330":{"id":"330","region_id":"27","name":"Wakatobi Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"464":{"id":"464","region_id":"22","name":"Waropen Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"381":{"id":"381","region_id":"16","name":"Way Kanan Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"60":{"id":"60","region_id":"10","name":"Wonogiri Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"61":{"id":"61","region_id":"10","name":"Wonosobo Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"465":{"id":"465","region_id":"22","name":"Yahukimo Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"467":{"id":"467","region_id":"22","name":"Yalimo Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"466":{"id":"466","region_id":"22","name":"Yapen Waropen Kab.","lat":"0.000","lon":"0.000","zoom":"8","display_order":0},"72":{"id":"72","region_id":"32","name":"Yogyakarta Kota","lat":"0.000","lon":"0.000","zoom":"8","display_order":0}};

$("#getlocation").val("");
 var successCallback = function(position){
	 var x = position.coords.latitude;
	 var y = position.coords.longitude;

 	 $('input[name="data[coordinates][latitude]"]').val(x);
 	 $('input[name="data[coordinates][longitude]"]').val(y);

 	 $('input[name="data[location]"]').val(y+','+x);

 	 // $("#getlocation").val('done');
 	 
 	 displayLocation(x,y);
 };

function displayLocation(latitude,longitude){
   var request = new XMLHttpRequest();

   var method = 'GET';
   var url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='+latitude+','+longitude+'&sensor=true';
   var async = true;

   request.open(method, url, async);
   request.onreadystatechange = function(){
   if(request.readyState == 4 && request.status == 200){
     var data = JSON.parse(request.responseText);
     console.log(request.responseText); // check under which type your city is stored, later comment this line
     var addressComponents = data.results[1].address_components;
     // console.log(data);
	 $("#getlocation").val(addressComponents[0]["long_name"]);    
   }
};
request.send();
};

$("#btn-start-login").click(function(){
	$("#btn-start-login").slideToggle('fast',function(){
		$("#form-login").slideToggle();
	});
});

$("#add-info").click(function(){
	$(".add-info").slideToggle('fast');
	$("i", this).toggleClass("fa-chevron-down fa-chevron-up");
});

$("#btn-ajakteman").click(function(e){
	$('html,body').animate({
        scrollTop: $("#section-ajakteman").offset().top},
        'slow');
	e.preventDefault(); 
	return false;
});
    
$("#upload-img").change(function(){
	var file = $('#upload-img')[0].files[0];
	if (file){ $(".btn-upload-img").html(file.name) }
});


// $("#getlocation").click(function(e){
// 	var $btn = $(this).val('Searching...');
//   // navigator.geolocation.getCurrentPosition( successCallback, errorHandler, {enableHighAccuracy: true, maximumAge: 10000});
// 	navigator.geolocation.getCurrentPosition(successCallback);
// });

$("#getlocation").click(function(e){
  var $btn = $(this).val('Searching...');
    $('#location.form-message').html("Tidak berhasil menemukan? Klik <a id='search-manual'>disini</a>")
    $('#search-manual').click(function(e){
        $('input#getlocation').slideUp();
        $('.form-message#location').empty();
        $(".form-message#location").before('<select class="form-control" id="select-province" name="data[region_id]"><option value="">Pilih Propinsi</option></select>');
        $.each(regionsJSON,function(key){
            $('select#select-province').append($('<option>', {value:regionsJSON[key]['id'], text:regionsJSON[key]['name']}));
        });
        $("select#select-province").after('<div class="text-danger form-message" id="region_id"></div>');

        $('select#select-province').change(function(e){
            var vals = $('select#select-province').val();

            if($('select#select-city').length){ //KALAU SUDAH PERNAH PILIH PROPINSI
                $('select#select-city').empty();
                $('select#select-city').append('<option value="">Pilih Kota</option>');
                $.each(subregionsJSON,function(key){
                    if(subregionsJSON[key]['region_id'] == vals ){
                        $('select#select-city').append($('<option>', {value:subregionsJSON[key]['id'], text:subregionsJSON[key]['name']}));
                    }
                });
            }else{ //KALAU BARU PERTAMA KALI PILIH PROPINSI
                $('<select style="display:none" class="form-control" id="select-city" name="data[subregion_id]"><option value="">Pilih Kota</option></select>').insertAfter($('select#select-province')).fadeIn('fast');
                $.each(subregionsJSON,function(key){
                    if(subregionsJSON[key]['region_id'] == vals ){
                        $('select#select-city').append($('<option>', {value:subregionsJSON[key]['id'], text:subregionsJSON[key]['name']}));
                    }
                });
                $(".form-message#region_id").after('<div class="text-danger form-message" id="subregion_id"></div>');
            }
        });
        
    });
  // navigator.geolocation.getCurrentPosition( successCallback, errorHandler, {enableHighAccuracy: true, maximumAge: 10000});
  navigator.geolocation.getCurrentPosition(successCallback);
});

//BUAT UPLOAD IMG PASANG IKLAN
$('.upload-image').on('change', function(){

	var count = $(this).attr('data-count');

	$( "#form-upload" ).trigger("submit", [this, count]);

	return false;
});

$('#form-upload').on('submit', function(event, image, count){

	$('#image-preview-'+count).find('.fa-plus').toggleClass('fa-plus fa-spinner fa-spin');

	var $this = $(this);
    var action = $this.attr('action');

    event.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        type: "POST",
        url: action,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data)
        {
          if(data.st == 'success')
          {
            $('#image').html('');

            $('#temporary_key').val(data.temporary_key);
            $('input[name="data[photos_group_key]"]').val(data.temporary_key);

            readImg(image, count, data.slot);
          }
          else
          {
          	$('#image').html('<small>'+data.msg+'<small>');

          	$('#image-preview-'+count).find('.fa-spinner.fa-spin').toggleClass('fa-spinner fa-spin fa-plus');
          }
        },
        error: function(data)
        {
          var response = JSON.parse(data.responseText);

          $.each( response, function( key, value) 
          {
              $('#image').html('<small>'+value+'<small>');
          });

          $('#image-preview-'+count).find('.fa-spinner.fa-spin').toggleClass('fa-spinner fa-spin fa-plus');
        }
    });

	return false;
});


function readImg(input,count, slot) { 
    if (input.files && input.files[0]) {
        var reader = new FileReader();  

        reader.onload = function (e) {
            count = parseInt(count); 
            slot = parseInt(slot); 
            console.log(count);
            console.log(slot);
            $('#image-preview-'+count).css('width', '150px');
            $('#image-preview-'+count).css('height', '150px');
            $('#image-preview-'+count).css('margin', '0 auto');
            $('#image-preview-'+count).css('background-size', 'cover');
            $('#image-preview-'+count).css('background-image', 'url(' + e.target.result + ')');
            $('#image-preview-'+count).find('label').removeAttr('for');
            $('#image-preview-'+count).find('.fa-spinner.fa-spin').toggleClass('fa-spinner fa-spin fa-close');

            $('#image-preview-'+count).attr('data-slot', slot);

            next_slot = slot + 1;
            count = count + 1;

            if($('.image-uploader').length < 8)
            {
            	$('#upload-image').attr('data-count', count);
            	$(".section-images").append('<div class="image-uploader"><div class="images-container" id="image-preview-'+count+'" data-slot="0"><label for="upload-image"><i class="fa fa-plus"></i></label></div></div>');
            }
        }      

        reader.readAsDataURL(input.files[0]);
    }
}

$(document).on('click', '.fa-close', function () {

	$(this).toggleClass('fa-plus fa-spinner fa-spin');

	var $this = $(this);
	var temporary_key = $('input[name="data[photos_group_key]"]').val();
	var slot = $this.parent().parent().attr('data-slot');
	
	$.post( APP_URL+'/dashboard/pasang-iklan/delete', { temporary_key: temporary_key, slot: slot })
	.done(function( data ) {
		if(data.st == 'success')
		{
	    	$this.parent().parent().parent().remove();

	    	if($('div.images-container[data-slot="0"]').length === 0)
	    	{
	    		$('#upload-image').attr('data-count', slot);
            	$(".section-images").append('<div class="image-uploader"><div class="images-container" id="image-preview-'+slot+'" data-slot="0"><label for="upload-image"><i class="fa fa-plus"></i></label></div></div>');
	    	}

	    	if($('div.images-container').length == 1)
	    	{
	    		$('input[name="data[photos_group_key]"]').val('');
	    		$('#temporary_key').val('');
	    	}
	    }
	    else
	    {
	    	$('#image').html('<small>'+data.msg+'<small>');

	    	$this.toggleClass('fa-spinner fa-spin fa-plus');
	    }
	});
});
//END OF UPLOAD IMG PASANG IKLAN

$("#choose-category").click(function(e){

	var category_id = $('#category_id').attr('data-parent');

	if(!category_id)
	{
		$("#modalChoose-category").modal('show');
	}
	else
	{
		$( ".category" ).trigger("click", [category_id]);

		$("#modalChoose-category").modal('show');
	}
});

$(document).on('click', '.category', function(event, category_id){

	$('#modalChoose-category .cat-list').html('<i class="fa fa-spinner fa-spin"></i>');

	var $this = $(this);

	if(!category_id)
	{
		var id = $this.attr('data-id');
	}
	else
	{
		var id = category_id;
	}

	var category_url = APP_URL+'/dashboard/pasang-iklan/category/'+id;
  	$.get( category_url, function( data ) {
		if(data.st == 'success')
		{
			if(data.name !== 'Pilih Kategori')
			{
				$('#modalChoose-category .title').html('<a href="#" class="category" data-id="'+data.parent+'">Kembali</a> | '+data.name);
			}
			else
			{
				$('#modalChoose-category .title').html('Pilih Kategori');
			}
			$('.cat-list').html(data.html);
		}
		if(data.st == 'done')
		{
			$('#choose-category').val(data.name);
			$('#category_id').val(data.id);
			$('#category_id').attr('data-parent', data.parent);

			$("#modalChoose-category").modal('hide');

			$('#additional-form-required').html('');
			$('#additional-form-optional').html('');

			create_field(data.res);
		}
	});

	return false;
});

function create_field(res)
{
	var str = createPhone('No Telp / HP', 'phone');
	var required = true;
	if(required)
    {
    	$('#additional-form-required').append(str);
    }
    else
    {
    	$('#additional-form-optional').append(str);
    }

	parameters = res.data.parameters;

	// console.log(parameters);
	$.each(parameters,function(key){
		var label = parameters[key]['labels']['id'];
        var field_name = parameters[key]['code'];
        switch(parameters[key]['type']){

            case 'price': 
                var str = createPrice(label,field_name);
                var required = parameters[key]['required'];
                if(required)
                {
                	$('#additional-form-required').append(str);
                }
                else
                {
                	$('#additional-form-optional').append(str);
                }

                break;

            case 'input': 
                var str = createInput(label,field_name,true);
                var required = parameters[key]['required'];
                if(required)
                {
                	$('#additional-form-required').append(str);
                }
                else
                {
                	$('#additional-form-optional').append(str);
                }

                break;

            case 'select': 
                var items = parameters[key]['options'];
                var str = createSelect(label,field_name,items);
                var required = parameters[key]['required'];
                if(required)
                {
                	$('#additional-form-required').append(str);
                }
                else
                {
                	$('#additional-form-optional').append(str);
                }

                break;

            case 'checkboxes': 
                var items = parameters[key]['options'];
                var str = createCheckboxes(label,field_name,items);
                var required = parameters[key]['required'];
                if(required)
                {
                	$('#additional-form-required').append(str);
                }
                else
                {
                	$('#additional-form-optional').append(str);
                }
                	
                break;

            case 'salary':                 
                var str = createSalary(label,field_name);
                var required = parameters[key]['required'];
                if(required)
                {
                	$('#additional-form-required').append(str);
                }
                else
                {
                	$('#additional-form-optional').append(str);
                }
                break;
		}
	});
}

function createPhone(label,field_name){
  var forminput = '<div class="form-group"><label>'+label+'</label><input type="text" class="form-control" id="" placeholder="" name="data['+ field_name +']"><div class="text-danger form-message" id="'+field_name+'"></div></div>';
  return forminput;
}

function createPrice(label,field_name){
  var forminput = '<div class="form-group"><label>'+label+'</label><input type="text" class="form-control" id="" placeholder="" name="data[params]['+ field_name +']"><div class="text-danger form-message" id="'+field_name+'"></div></div>';
  return forminput;
}

function createInput(label,field_name){
  var forminput = '<div class="form-group"><label>'+label+'</label><input type="text" class="form-control" id="" placeholder="" name="data[params]['+ field_name +']"><div class="text-danger form-message" id="'+field_name+'"></div></div>';
  return forminput;
}

function createSelect(label,field_name,items){
  var forminput = "";
  forminput += '<div class="form-group"><label>'+label+'</label><select class="form-control" name="data[params]['+ field_name +']">';
  $.each(items,function(key){
    forminput += "<option value='"+key+"'>"+items[key]['id']+"</option>";
  });
  forminput += "</select><div class='text-danger form-message' id='"+field_name+"'></div></div>"
  return forminput;
}

function createCheckboxes(label,field_name,items){
  var forminput = "";
  forminput += '<div class="form-group"><label control-label">'+label+'</label><div class="row">';
  $.each(items,function(key){
    str = items[key]['id'];
    var cekboxname = str.replace(/\s+/g, '').toLowerCase();
    forminput += '<div class="col-xs-12 col-sm-6 col-md-4"><label class="checkbox-inline"><input type="checkbox" name="data[params]['+field_name+']['+key+']" value="'+ key +'"> '+ items[key]['id'] +' </label></div>';
  });
  forminput += "<div class='text-danger form-message' id='"+field_name+"'></div></div>"
  return forminput;
}

function createSalary(label,field_name){
  var forminput = '</div><div class="form-group"><label>'+field_name+'</label><div class="row"><div class="col-sm-5"><input type="text" class="form-control" name="data[params]['+field_name+'][from]" placeholder="Minimum"></div><div class="col-sm-2"><center>-</center></div><div class="col-sm-5"><input type="text" class="form-control" name="data[params]['+field_name+'][to]" placeholder="Maksimum"></div></div><p class="col-md-10 text-danger form-message" id="'+field_name+'"></div></div>';
  return forminput;
}

$('.count-input').on('input', function() { 
    $(".counter span").html(( $('.count-input').val().length ));
});

