@extends('layout.master')

@section('css', asset('css/faq.css'))

@section('content')
<div class="container">
    <h1 class="subJudul my-3"><strong>FAQ</strong></h1>

    <div class="row atas">
        <h3 class="teks d-flex align-items-center justify-content-center mt-3">Ada yang bisa kami bantu?</h3>
        
        <!-- Search Bar -->
        <div class="search-container mb-4">
            <form onsubmit="searchQuestions(); return false;">
                <div class="input-group">
                    <input type="text" id="searchInput" class="form-control" placeholder="Cari pertanyaan..." aria-label="Cari pertanyaan" aria-describedby="searchButton">
                    <button class="btn btn-custom" type="submit" id="searchButton">Cari</button>
                </div>
            </form>
        </div>
    </div>
   
    <!-- FAQ Section -->
    <div class="accordion" id="faqAccordion">

        <!-- Question 1 -->
        <div class="accordion-item my-1">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    Bagaimana saya bisa menjadi sukarelawan di Misi Bumi?
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Kamu bisa menjadi sukarelawan dengan mendaftar melalui halaman <strong>Sukarelawan</strong> di situs kami. Kami selalu mencari individu yang bersemangat untuk membantu dalam berbagai kegiatan seperti penanaman pohon, kampanye kesadaran, dan pengembangan konten edukasi.
                </div>
            </div>
        </div>

        <!-- Question 2 -->
        <div class="accordion-item my-1">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Apa itu Misi Bumi?
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Misi Bumi adalah platform yang berkomitmen untuk menjaga dan melestarikan lingkungan dengan berbagai kegiatan seperti kampanye lingkungan, donasi pohon, dan edukasi tentang emisi karbon. Kami berusaha menginspirasi masyarakat untuk ikut serta dalam menjaga bumi.
                </div>
            </div>
        </div>

        <!-- Question 3 -->
        <div class="accordion-item my-1">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Bagaimana cara berdonasi untuk menanam pohon?
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Kamu dapat berdonasi melalui halaman <strong>Donasi</strong> di situs kami. Setiap donasi yang kamu berikan akan digunakan untuk menanam pohon di area yang membutuhkan reboisasi. Kami bekerja sama dengan organisasi lingkungan untuk memastikan bahwa setiap pohon yang ditanam memberikan dampak positif.
                </div>
            </div>
        </div>

        <!-- Question 4 -->
        <div class="accordion-item my-1">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Bagaimana cara menggunakan alat pengukur emisi karbon?
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Alat pengukur emisi karbon kami mudah digunakan. Kamu hanya perlu memasukkan data aktivitas harianmu, seperti penggunaan kendaraan, konsumsi listrik, dan penggunaan barang elektronik. Sistem kami akan menghitung jejak karbon yang dihasilkan dan memberikan saran untuk menguranginya.
                </div>
            </div>
        </div>

    </div>
    
</div>

<script>
function searchQuestions() {
    var input, filter, accordion, items, button, i, txtValue;
    input = document.getElementById('searchInput');
    filter = input.value.toUpperCase();
    accordion = document.getElementById("faqAccordion");
    items = accordion.getElementsByClassName('accordion-item');

    for (i = 0; i < items.length; i++) {
        button = items[i].getElementsByClassName("accordion-button")[0];
        txtValue = button.textContent || button.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            items[i].style.display = "";
        } else {
            items[i].style.display = "none";
        }
    }
}
</script>

@endsection
