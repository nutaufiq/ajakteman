<!-- Modal -->
<div class="modal fade" id="modalNotif-ajakteman-success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
          <div class="notif-hello">Hello, {{ Auth::user()->name }}</div>
          <div class="notif-message">Terima kasih telah mengajak teman Anda untuk pasang iklan di OLX</div>
          <div class="btn-area"><a href="" data-dismiss="modal">KEMBALI KE DASHBOARD</a></div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="advertModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
          <div class="notif-hello">Hello, {{ Auth::user()->name }}</div>
          <div class="notif-message">Mohon maaf Anda tidak dapat mengikuti program ini.</div>
          <div class="btn-area"><a href="{{ url('dashboard#section-ajakteman') }}">AJAK TEMAN SEKARANG</a></div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalChoose-category" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
      	<div class="choose-category">
      		<div class="title">
            <a href="#" class="category" data-id="0">Pilih Kategori</a>
          </div>
          <div class="cat-list">
        		<ul class="category-list">
        			<li><a href="#" class="category" data-id="86">Mobil</a></li>
              <li><a href="#" class="category" data-id="87">Motor</a></li>
              <li><a href="#" class="category" data-id="88">Properti</a></li>
              <li><a href="#" class="category" data-id="98">Keperluan Pribadi</a></li>
              <li><a href="#" class="category" data-id="92">Elektronik & Gadget</a></li>
              <li><a href="#" class="category" data-id="94">Hobi & Olahraga</a></li>
              <li><a href="#" class="category" data-id="89">Rumah Tangga</a></li>
              <li><a href="#" class="category" data-id="96">Perlengkapan Bayi & Anak</a></li>
              <li><a href="#" class="category" data-id="90">Kantor & Industri</a></li>
              <li><a href="#" class="category" data-id="97">Jasa & Lowongan Kerja</a></li>
        		</ul>
          </div>
      		<div class="cancel-btn" data-dismiss="modal"><a href="">BATAL</a></div>
      	</div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalNotif-advert-success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
          <div class="notif-hello">Hello, {{ Auth::user()->name }}</div>
          <div class="notif-message">Terima kasih telah memasang iklan Anda di OLX</div>
          <div class="btn-area"><a href="{{ url('dashboard/pasang-iklan') }}">KEMBALI KE DASHBOARD</a></div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalNotif-redeem-success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
          <div class="notif-hello">Hello, {{ Auth::user()->name }}</div>
          <div class="notif-message">Tukar voucher berhasil, pihak OLX akan melakukan verifikasi terlebih dahulu.</div>
          <div class="btn-area"><a href="" data-dismiss="modal">KEMBALI KE DASHBOARD</a></div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalNotif-reminder-success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
          <div class="notif-hello">Hello, {{ Auth::user()->name }}</div>
          <div class="notif-message">Email pengingat berhasil dikirim.</div>
          <div class="btn-area"><a href="" data-dismiss="modal">KEMBALI KE DASHBOARD</a></div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalNotif-reminder-failed" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
          <div class="notif-hello">Hello, {{ Auth::user()->name }}</div>
          <div class="notif-message">Anda sudah mengirimkan email pengingat hari ini.</div>
          <div class="btn-area"><a href="" data-dismiss="modal">KEMBALI KE DASHBOARD</a></div>
      </div>
    </div>
  </div>
</div>