@extends('layout.master')

@section('css', asset('css/aboutus.css'))


@section('content')
    <h1 class="subJudul my-3"><strong>About Us</strong></h1>
    <div class="row misibumi">
        
        
    </div>

    <div class="row misibumi">
        <div class="col-1"></div>
        <div class="col-4 d-flex align-items-center justify-content-center">
            <img src="{{ asset('asset/about/about1.png') }}" class="gambar" alt="">
        </div>
        <div class="col-5 mt-5">
            <h3>Misi Bumi </h3>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <p class="deskMisi">Misi Bumi adalah sebuah platform yang berkomitmen untuk menjaga dan melestarikan lingkungan kita. Kami percaya bahwa setiap tindakan kecil dapat berdampak besar bagi bumi yang kita cintai. Oleh karena itu, kami menyediakan berbagai fitur untuk membantu kamu berkontribusi dalam menjaga keberlangsungan alam.</p>
                </div>
                <div class="col-1"></div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
    
        

    <div class="bg" style="background-image: url('{{ asset('asset/about/about2.png') }}');">
        <div class="row">
            <div class="col-6 d-flex flex-column justify-content-center align-items-center stats mt-5">
                <h3>Visi</h3>
                <div class="green-line"></div>
            </div>
            <div class="col-6 d-flex flex-column justify-content-center align-items-center stats mt-5">
                <h3>Misi</h3>
                <div class="green-line"></div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-1"></div>
            <div class="col-5 d-flex justify-content-center mt-2">
                <p>Mewujudkan bumi yang lebih hijau dan berkelanjutan.</p>
            </div>
            <div class="col-5 d-flex justify-content-center mt-2">
                <p>Menginspirasi dan memfasilitasi masyarakat untuk berpartisipasi aktif dalam pelestarian lingkungan melalui kampanye, donasi pohon, dan pengurangan emisi karbon.</p>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
        
    <div class="row d-flex flex-column justify-content-center align-items-center stats1">
        <h3 class="fitur">Fitur Kami</h3>
        <div class="green-line1"></div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <p class="fitur1">1. Buat Kampanye</p>
            <p class="fitur2">
            Fitur ini memungkinkan kamu untuk membuat dan mengelola kampanye lingkungan sendiri. Dengan fitur ini, kamu dapat mengajak orang lain untuk berpartisipasi dalam kegiatan pelestarian lingkungan, seperti membersihkan pantai, menanam pohon, atau kampanye edukasi
            </p>

            <p class="fitur1">2. Turut Berkontribusi</p>
            <p class="fitur2">
            Fitur ini memberi kamu kesempatan untuk berkontribusi dalam berbagai kegiatan dan proyek yang diadakan oleh "Misi Bumi" atau mitra kami. Kamu bisa berdonasi, menjadi sukarelawan, atau mendukung kampanye yang ada untuk membantu menjaga dan melestarikan alam.
            </p>

            <p class="fitur1">3. Menghitung Emisi Karbon</p>
            <p class="fitur2">
            Fitur ini menyediakan alat untuk menghitung jejak karbon dari aktivitas sehari-hari kamu. Dengan memasukkan data seperti penggunaan energi, transportasi, dan konsumsi, kamu dapat mengetahui seberapa besar emisi karbon yang kamu hasilkan dan mencari cara untuk menguranginya.
            </p>

            <p class="fitur1">4. Mengenal Jenis Pohon Anti-Emisi</p>
            <p class="fitur2">
            Fitur ini memberikan informasi tentang berbagai jenis pohon yang efektif dalam menyerap karbon dioksida dan membantu mengurangi emisi. Kamu bisa belajar tentang manfaat masing-masing jenis pohon dan bagaimana kontribusi mereka terhadap kesehatan lingkungan.
            </p>
        </div>
        <div class="col-1"></div>
    </div>

    
    <div class="row tim">
        <h3 class="jdltim my-3">Tim Kami</h3>
        <div class="col-1"></div>
        <div class="col-10">
            <p class="desk">Kami adalah sekelompok individu yang bersemangat dengan latar belakang yang beragam, namun memiliki satu tujuan yang sama: melindungi bumi kita. Dari ahli lingkungan, pengembang teknologi, hingga komunikator, kami bekerja bersama untuk menciptakan platform yang bermanfaat bagi semua.</p>
        </div>
        <div class="col-1"></div>
    </div>

        
    <div class="row">
        <h3 class="jdl my-3">Hubungi Kami</h3>
        <div class="col-1"></div>
        <div class="col-10">
            <p class="desk1">Ingin tahu lebih banyak atau memiliki pertanyaan? Hubungi kami melalui email di contact@misibumi.com atau ikuti kami di media sosial untuk mendapatkan update terbaru.</p>
            <p><i class="fas fa-phone"></i> +62 8123 456 789</p>
        <p><i class="fas fa-paper-plane"></i> contact@misibumi.com</p>
        </div>
        <div class="col-1"></div>
    </div>
        
        

@endsection
