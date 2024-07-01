<x-layouts.app>
    <x-slot:title>
        Home
    </x-slot>
    <section id="beranda">
        <div class="flex flex-wrap mx-0 p-20 dark:bg-gray-900">
            <div class="w-full self-center lg:w-1/2 md:6/12">
                <h1 class="text-6xl font-semibold pb-6 dark:text-white">Tempat kegiatan belajar mengajar menjadi satu
                </h1>
                <p class="font-light pb-4 dark:text-white">Yoker Class adalah membantu pendidik menciptakan pengalaman
                    belajar yang menarik yang dapat mereka personalisasi, kelola, dan ukur.</p>
                <a href="">
                    <button
                        type="button"class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Mari
                        Belajar</button>
                </a>
            </div>
            <div class="w-full px-4 lg:w-1/2">
                <div class="relative mt-10 lg:mt-0 md:6/12 lg:right-0"">
                    <img src="{{ asset('images/learning.png') }}" alt="E-Gov">
                </div>
            </div>
        </div>
    </section>
    <section id="fitur" class="bg-gray-100 p-10 dark:bg-gray-800">
        <div class="pb-10 px-60">
            <h1 class="text-center pb-5 text-4xl font-semibold dark:text-gray-100">Jutaan orang di seluruh dunia
                menggunakan
                Yoker Class</h1>
            <p class="text-center justify-center text-lg font-normal">Yoker Class dirancang dengan masukan dari
                komunitas pendidikan, yang memengaruhi pengembangan fitur baru yang memungkinkan pendidik fokus pada
                pengajaran dan siswa fokus pada pembelajaran.</p>
        </div>
        <div class="flex flex-row justify-center gap-6">
            <div
                class="bg-white w-80 h-56 shadow rounded-lg content-center text-center p-8 dark:bg-gray-900 hover:bg-blue-200 hover:border-2 hover:border-blue-600">
                <img class="mx-auto max-w-16 pb-4" src="{{ asset('images/learning_4185218.png') }}" alt="Domain">
                <h1 class="font-semibold text-lg dark:text-gray-100">Personalisasi proses belajat</h1>
            </div>
            <div
                class="bg-white w-80 h-56 shadow rounded-lg content-center text-center p-8 dark:bg-gray-900 hover:bg-blue-200 hover:border-2 hover:border-blue-600">
                <img class="mx-auto max-w-16 pb-4" src="{{ asset('images/notebook_2904859.png') }}" alt="Email">
                <h1 class="font-semibold text-lg dark:text-gray-100">Sederhanakan tugas sehari-hari</h1>
            </div>
            <div
                class="bg-white w-80 h-56 shadow rounded-lg content-center text-center p-8 dark:bg-gray-900 hover:bg-blue-200 hover:border-2 hover:border-blue-600">
                <img class="mx-auto max-w-16 pb-4" src="{{ asset('images/research_15175940.png') }}" alt="VPS">
                <h1 class="font-semibold text-lg dark:text-gray-100">Dapat insight dan visibilitas</h1>
            </div>
        </div>
    </section>
    <section id="personalisasi proses belajar">
        <div class="pt-16 px-60">
            <img class="mx-auto max-w-12 pb-6" src="{{ asset('images/learning_4185218.png') }}" alt="Domain">
            <h1 class="text-center text-4xl pb-5 font-semibold dark:text-gray-100">Perkaya dan personalisasi proses
                belajar</h1>
            <p class="text-center justify-center text-lg font-normal">Dorong efisiensi siswa dengan alat yang dapat
                mereka akses dari mana saja – dan bangun keterampilan untuk masa depan mereka.</p>
        </div>
        <div class="flex flex-wrap mx-20 dark:bg-gray-900">
            <div class="w-full lg:w-1/2">
                <div class="relative mt-10 lg:mt-0 md:6/12 lg:right-0"">
                    <img src="{{ asset('images/learning-concept-illustration.png') }}" alt="E-Gov">
                </div>
            </div>
            <div class="w-full self-center lg:w-1/2 md:6/12">
                <div>
                    <h1 class="text-2xl font-semibold pb-6 dark:text-gray-100">Fitur yang menginspirasi cara baru untuk
                        mengajar dan belajar</h1>
                </div>
                <div>
                    <div class="flex flex-row space-x-9 pb-9">
                        <div class="w-16 border border-solid border-gray-300 rounded-3xl text-center content-center">
                            <p class="text-3xl font-medium dark:text-gray-100">1</p>
                        </div>
                        <div class="w-full">
                            <h2 class="text-xl font-medium dark:text-gray-100">Tingkatakan potensi siswa</h2>
                            <p class="text-base font-normal dark:text-gray-100">Buat tugas interaktif, bahkan dari PDF
                                yang sudah ada, yang dapat memberikan respons real-time dan panduan individual melalui
                                perintah dan petunjuk dengan bantuan AI.</p>
                        </div>
                    </div>
                    <div class="flex flex-row space-x-9 pb-9">
                        <div class="w-16 border border-solid border-gray-300 rounded-3xl text-center content-center">
                            <p class="text-3xl font-medium dark:text-gray-100">2</p>
                        </div>
                        <div class="w-full">
                            <h2 class="text-xl font-medium dark:text-gray-100">Perkuat konsep dengan belajar mandiri
                            </h2>
                            <p class="text-base font-normal dark:text-gray-100">Sertakan pertanyaan interaktif untuk
                                video YouTube, sehingga siswa dapat melihat masukan real-time di sepanjang pelajaran
                                sambil melihat laporan performa mereka.</p>
                        </div>
                    </div>
                    <div class="flex flex-row space-x-9 pb-9">
                        <div class="w-16 border border-solid border-gray-300 rounded-3xl text-center content-center">
                            <p class="text-3xl font-medium dark:text-gray-100">3</p>
                        </div>
                        <div class="w-full">
                            <h2 class="text-xl font-medium dark:text-gray-100">Tingkatkan pelajaran dengan integrasi
                                populer</h2>
                            <p class="text-base font-normal dark:text-gray-100">Temukan, tambahkan, gunakan, dan nilai
                                konten dengan mudah menggunakan add-on dari alat Teknologi Pendidikan populer, langsung
                                di dalam Classroom.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-gray-100 mx-20 p-10 shadow rounded-3xl">
            <h2 class="text-2xl font-medium mb-7">Jadikan pembelajaran lebih personal dan berpusat pada siswa</h2>
            <div class="flex flex-row space-x-10">
                <div class="w-full">
                    <h2 class="text-xl font-normal dark:text-gray-100">Dukung beragam pengajaran
                    </h2>
                    <p class="text-base font-normal text-gray-600 dark:text-gray-100">Sesuaikan tugas kelas untuk
                        setiap siswa serta dukung meraka dengan masukan real-time dan alat komunikasi yang mudah.
                    </p>
                </div>
                <div class="w-full">
                    <h2 class="text-xl font-normal dark:text-gray-100">Tumbuhkan integritas akademik
                    </h2>
                    <p class="text-base font-normal text-gray-600 dark:text-gray-100">Dorong siswa untuk menggunakan
                        buah pikirannya sendiri dan identifikasi potensi plagiarisme dengan laporan keaslian yang
                        membandingkan tugas siswa dengan miliaran halaman web dan lebih dari 40 juta buku.</p>
                </div>
                <div class="w-full">
                    <h2 class="text-xl font-normal dark:text-gray-100">Jadikan pembelajaran dapat diakses dan
                        inklusif
                    </h2>
                    <p class="text-base font-normal text-gray-600 dark:text-gray-100">Bantu siswa menyesuaikan
                        linkungan belajar mereka untuk mengurangi hambatan belajar.</p>
                </div>
                <div class="w-full">
                    <h2 class="text-xl font-normal dark:text-gray-100">Siapkan siswa menghadapi masa depan
                    </h2>
                    <p class="text-base font-normal text-gray-600 dark:text-gray-100">Dorong ketrampilan organisasi
                        dan manajemen waktu dengan daftar tugas yang interaktif, batas waktu otomatis, dan alat
                        produktivitas terkemuka di industri.</p>
                </div>
            </div>
        </div>
    </section>
    <section id="sederhanakan tugas sehari-hari">
        <div class="pt-16 px-60">
            <img class="mx-auto max-w-12 pb-6" src="{{ asset('images/notebook_2904859.png') }}" alt="Domain">
            <h1 class="text-center text-4xl pb-5 font-semibold dark:text-gray-100">Tingkatkan pengajaran dengan berbagai
                alat yang menyederhanakan tugas sehari-hari</h1>
            <p class="text-center justify-center text-lg font-normal">Efisienkan waktu pengajaran dengan alat yang
                dibuat khusus untuk pengajaran, produktivitas, dan kolaborasi.</p>
        </div>
        <div class="flex flex-wrap mx-20 dark:bg-gray-900">
            <div class="w-full  self-center lg:w-1/2 md:6/12">
                <div>
                    <h1 class="text-2xl font-semibold pb-6 dark:text-gray-100">Fitur yang menginspirasi cara baru untuk
                        mengajar dan belajar</h1>
                </div>
                <div>
                    <div class="flex flex-row space-x-9 pb-9">
                        <div class="w-16 border border-solid border-gray-300 rounded-3xl text-center content-center">
                            <p class="text-3xl font-medium dark:text-gray-100">1</p>
                        </div>
                        <div class="w-full">
                            <h2 class="text-xl font-medium dark:text-gray-100">Tingkatakan potensi siswa</h2>
                            <p class="text-base font-normal dark:text-gray-100">Buat tugas interaktif, bahkan dari PDF
                                yang sudah ada, yang dapat memberikan respons real-time dan panduan individual melalui
                                perintah dan petunjuk dengan bantuan AI.</p>
                        </div>
                    </div>
                    <div class="flex flex-row space-x-9 pb-9">
                        <div class="w-16 border border-solid border-gray-300 rounded-3xl text-center content-center">
                            <p class="text-3xl font-medium dark:text-gray-100">2</p>
                        </div>
                        <div class="w-full">
                            <h2 class="text-xl font-medium dark:text-gray-100">Perkuat konsep dengan belajar mandiri
                            </h2>
                            <p class="text-base font-normal dark:text-gray-100">Sertakan pertanyaan interaktif untuk
                                video YouTube, sehingga siswa dapat melihat masukan real-time di sepanjang pelajaran
                                sambil melihat laporan performa mereka.</p>
                        </div>
                    </div>
                    <div class="flex flex-row space-x-9 pb-9">
                        <div class="w-16 border border-solid border-gray-300 rounded-3xl text-center content-center">
                            <p class="text-3xl font-medium dark:text-gray-100">3</p>
                        </div>
                        <div class="w-full">
                            <h2 class="text-xl font-medium dark:text-gray-100">Tingkatkan pelajaran dengan integrasi
                                populer</h2>
                            <p class="text-base font-normal dark:text-gray-100">Temukan, tambahkan, gunakan, dan nilai
                                konten dengan mudah menggunakan add-on dari alat Teknologi Pendidikan populer, langsung
                                di dalam Classroom.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full px-4 lg:w-1/2">
                <div class="relative mt-10 lg:mt-0 md:6/12 lg:right-0"">
                    <img src="{{ asset('images/modern-hand-drawn-education-concept.png') }}" alt="E-Gov">
                </div>
            </div>
        </div>
        <div class="bg-gray-100 mx-20 p-10 shadow rounded-3xl">
            <h2 class="text-2xl font-medium mb-7">Jadikan pembelajaran lebih personal dan berpusat pada siswa</h2>
            <div class="flex flex-row space-x-10">
                <div class="w-full">
                    <h2 class="text-xl font-normal dark:text-gray-100">Dukung beragam pengajaran
                    </h2>
                    <p class="text-base font-normal text-gray-600 dark:text-gray-100">Sesuaikan tugas kelas untuk
                        setiap siswa serta dukung meraka dengan masukan real-time dan alat komunikasi yang mudah.
                    </p>
                </div>
                <div class="w-full">
                    <h2 class="text-xl font-normal dark:text-gray-100">Tumbuhkan integritas akademik
                    </h2>
                    <p class="text-base font-normal text-gray-600 dark:text-gray-100">Dorong siswa untuk
                        menggunakan buah pikirannya sendiri dan identifikasi potensi plagiarisme dengan laporan
                        keaslian yang membandingkan tugas siswa dengan miliaran halaman web dan lebih dari 40 juta
                        buku.</p>
                </div>
                <div class="w-full">
                    <h2 class="text-xl font-normal dark:text-gray-100">Jadikan pembelajaran dapat diakses dan
                        inklusif
                    </h2>
                    <p class="text-base font-normal text-gray-600 dark:text-gray-100">Bantu siswa menyesuaikan
                        linkungan belajar mereka untuk mengurangi hambatan belajar.</p>
                </div>
                <div class="w-full">
                    <h2 class="text-xl font-normal dark:text-gray-100">Siapkan siswa menghadapi masa depan
                    </h2>
                    <p class="text-base font-normal text-gray-600 dark:text-gray-100">Dorong ketrampilan organisasi
                        dan manajemen waktu dengan daftar tugas yang interaktif, batas waktu otomatis, dan alat
                        produktivitas terkemuka di industri.</p>
                </div>
            </div>
        </div>
    </section>
    <section id="dapatkan insight dan visibilitas">
        <div class="py-16 px-60">
            <img class="mx-auto max-w-12 pb-6" src="{{ asset('images/research_15175940.png') }}" alt="Domain">
            <h1 class="text-center text-4xl pb-5 font-semibold dark:text-gray-100">Beroperasi dengan solusi yang dirancang untuk mendapatkan visibilitas, insight, dan kontrol</h1>
            <p class="text-center justify-center text-lg font-normal">Ciptakan lingkungan belajar yang lebih mudah dikelola serta dukung pendidik dan siswa dengan alat yang terhubung dan lebih aman.</p>
        </div>
        <div class="flex flex-wrap mx-20 dark:bg-gray-900">
            <div class="w-full lg:w-1/2">
                <div class="relative mt-10 lg:mt-0 md:6/12 lg:right-0"">
                    <img src="{{ asset('images/hand-drawn-college-entrance-exam-illustration.png') }}" alt="E-Gov">
                </div>
            </div>
            <div class="w-full self-center lg:w-1/2 md:6/12">
                <div>
                    <h1 class="text-2xl font-semibold pb-6 dark:text-gray-100">Fitur yang menginspirasi cara baru untuk
                        mengajar dan belajar</h1>
                </div>
                <div>
                    <div class="flex flex-row space-x-9 pb-9">
                        <div class="w-16 border border-solid border-gray-300 rounded-3xl text-center content-center">
                            <p class="text-3xl font-medium dark:text-gray-100">1</p>
                        </div>
                        <div class="w-full">
                            <h2 class="text-xl font-medium dark:text-gray-100">Tingkatakan potensi siswa</h2>
                            <p class="text-base font-normal dark:text-gray-100">Buat tugas interaktif, bahkan dari PDF
                                yang sudah ada, yang dapat memberikan respons real-time dan panduan individual melalui
                                perintah dan petunjuk dengan bantuan AI.</p>
                        </div>
                    </div>
                    <div class="flex flex-row space-x-9 pb-9">
                        <div class="w-16 border border-solid border-gray-300 rounded-3xl text-center content-center">
                            <p class="text-3xl font-medium dark:text-gray-100">2</p>
                        </div>
                        <div class="w-full">
                            <h2 class="text-xl font-medium dark:text-gray-100">Perkuat konsep dengan belajar mandiri
                            </h2>
                            <p class="text-base font-normal dark:text-gray-100">Sertakan pertanyaan interaktif untuk
                                video YouTube, sehingga siswa dapat melihat masukan real-time di sepanjang pelajaran
                                sambil melihat laporan performa mereka.</p>
                        </div>
                    </div>
                    <div class="flex flex-row space-x-9 pb-9">
                        <div class="w-16 border border-solid border-gray-300 rounded-3xl text-center content-center">
                            <p class="text-3xl font-medium dark:text-gray-100">3</p>
                        </div>
                        <div class="w-full">
                            <h2 class="text-xl font-medium dark:text-gray-100">Tingkatkan pelajaran dengan integrasi
                                populer</h2>
                            <p class="text-base font-normal dark:text-gray-100">Temukan, tambahkan, gunakan, dan nilai
                                konten dengan mudah menggunakan add-on dari alat Teknologi Pendidikan populer, langsung
                                di dalam Classroom.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-gray-100 mx-20 p-10 shadow rounded-3xl">
            <h2 class="text-2xl font-medium mb-7">Jadikan pembelajaran lebih personal dan berpusat pada siswa</h2>
            <div class="flex flex-row space-x-10">
                <div class="w-full">
                    <h2 class="text-xl font-normal dark:text-gray-100">Dukung beragam pengajaran
                    </h2>
                    <p class="text-base font-normal text-gray-600 dark:text-gray-100">Sesuaikan tugas kelas untuk
                        setiap siswa serta dukung meraka dengan masukan real-time dan alat komunikasi yang mudah.
                    </p>
                </div>
                <div class="w-full">
                    <h2 class="text-xl font-normal dark:text-gray-100">Tumbuhkan integritas akademik
                    </h2>
                    <p class="text-base font-normal text-gray-600 dark:text-gray-100">Dorong siswa untuk menggunakan
                        buah pikirannya sendiri dan identifikasi potensi plagiarisme dengan laporan keaslian yang
                        membandingkan tugas siswa dengan miliaran halaman web dan lebih dari 40 juta buku.</p>
                </div>
                <div class="w-full">
                    <h2 class="text-xl font-normal dark:text-gray-100">Jadikan pembelajaran dapat diakses dan
                        inklusif
                    </h2>
                    <p class="text-base font-normal text-gray-600 dark:text-gray-100">Bantu siswa menyesuaikan
                        linkungan belajar mereka untuk mengurangi hambatan belajar.</p>
                </div>
                <div class="w-full">
                    <h2 class="text-xl font-normal dark:text-gray-100">Siapkan siswa menghadapi masa depan
                    </h2>
                    <p class="text-base font-normal text-gray-600 dark:text-gray-100">Dorong ketrampilan organisasi
                        dan manajemen waktu dengan daftar tugas yang interaktif, batas waktu otomatis, dan alat
                        produktivitas terkemuka di industri.</p>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
