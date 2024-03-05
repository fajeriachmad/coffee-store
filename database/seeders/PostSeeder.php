<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'title' => 'Manis dan Segarnya Es Dawet Rasa Durian ala Kang Ubed Cirebon',
            'slug' => 'manis-dan-segarnya-es-dawet-rasa-durian-ala-kang-ubed-cirebon',
            'body' => '
                <p>
                    Cirebon - Kota Cirebon memang cukup dikenal sebagai surganya kuliner di Jawa Barat. Selain memiliki beragam makanan khas seperti empal gentong, nasi lengko hingga docang, di daerah berjuluk "Kota Udang" ini juga tersedia aneka minuman dengan cita rasa yang mampu memanjakan lidah.
                    Nah, salah satu sajian minuman yang dapat ditemui saat berkunjung ke Kota Cirebon adalah es dawet ayu. Berbeda dengan es dawet pada umumnya, es dawet satu ini disajikan dengan paduan buah durian.
                </p>

                <p>
                    Soal rasa tak perlu diragukan lagi. Manis dan segarnya es dawet yang dikombinasikan dengan daging buah durian asli membuat minuman satu ini sangat cocok dinikmati kala siang hari. Terlebih ketika cuaca sedang terik.
                </p>

                <p>
                    Es dawet rasa durian ini bisa ditemukan di Jalan Veteran, Kebonbaru, Kecamatan Kejaksan, Kota Cirebon, Jawa Barat. Nama tempatnya adalah Es Dawet Kang Ubed.
                </p>

                <p>
                    Di tempat ini, Anda bisa merasakan nikmatnya es dawet berkuah santan yang dicampur dengan cairan gula merah serta dipadukan dengan buah durian yang memiliki aroma khas.
                </p>

                <p>
                    Menurut sang penjual, es dawet merupakan minuman yang berasal dari Banjarnegara, Jawa Tengah. Di tempat asalnya, es dawet telah memiliki beragam varian rasa. Mulai dari es dawet original, rasa buah durian, dan rasa buah nangka.
                </p>

                <p>
                    Begitu pun di tempat jualan Es Dawet Kang Ubed. Tiga varian rasa itu tersedia di tempat ini. Ya, es dawet yang sebelumnya hanya berkuah santan dan cairan gula merah, kini dipadukan dengan rasa buah durian dan buah nangka.
                </p>

                <p>
                    "Selain yang original, rasa es dawet yang populer memang rasa buah durian sama buah nangka," kata Qorib, penjual es dawet di warung Es Dawet Kang Ubed saat berbincang dengan detikJabar, baru-baru ini.
                </p>

                <p>
                    Sentuhan rasa dari buah-buahan itupun membuat es dawet khas Banjarnegara ini memiliki citarasa yang nikmat sekaligus menyegarkan.
                </p>

                <p>
                    Maka tak heran jika es dawet dengan beragam varian rasa yang tersedia di warung Es Dawet Kang Ubed cukup diminati oleh para konsumen. Dari beberapa varian rasa es dawet yang tersedia di warung Es Dawet Kang Ubed, es dawet rasa durian menjadi yang paling banyak diminati.
                </p>

                <p>
                    "Alhamdulillah peminatnya banyak. Terutama yang rasa durian," kata Qorib.
                </p>

                <p>
                    Untuk setiap porsi es dawet di warung Es Dawet Kang Ubed dijual dengan harga yang bervariatif. Untuk es dawet rasa original harganya hanya Rp7.500 per porsi. Kemudian untuk es dawet rasa durian harganya Rp10.000 per porsi. Selain dua rasa itu, ada juga es dawet rasa nangka dengan harga Rp12.000 per porsi.
                </p>

                <p>
                    Selanjutnya, ada juga menu es dawet dengan nama es dawet super durian. Dengan menu itu, konsumen bisa merasakan nikmatnya es dawet dengan campur buah durian yang melimpah. Untuk harganya Rp17.000 per porsi.
                </p>

                <p>
                    "Kalau menu super durian itu duriannya lebih banyak. Kita pakainya daging durian asli," kata Qorib.
                </p>

                <p>
                    Menurut Qorib, durian yang digunakan sebagai campuran es dawet ini adalah durian lokal. Durian-durian itu didatangkan dari berbagai daerah di nusantara. Seperti dari Kuningan, Jawa Barat, Banjarnegara, Jawa Tengah dan dari beberapa daerah lainnya.
                </p>

                <p>
                    Bagi yang penasaran mencicipi nikmatnya es dawet dengan rasa durian, bisa datang langsung ke warung Es Dawet Ayu Kang Ubed. Lokasinya berada di Jalan Veteran, Kebonbaru, Kecamatan Kejaksan, Kota Cirebon. Es Dawet Kang Ubed buka setiap hari mulai dari pukul 08.00 WIB - 17.00 WIB.
                </p>        
            ',
            'category_id' => '1'
        ]);
    }
}
