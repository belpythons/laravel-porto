<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Menyimpan semua data profil, diambil dari config/site.ts dan config/socials.ts
     */
    private function getProfileData()
    {
        return [
            'nama' => 'Belva ',
            'deskripsi' => 'Seorang pengembang web front-end yang bersemangat dengan keahlian dalam React-node dan laravel, berdedikasi untuk menciptakan pengalaman pengguna yang mulus dan menarik secara visual.',
            'alamat' => 'Bontang, Indonesia', // Data tambahan dari controller lama
            'nim' => '202312066', // Data tambahan dari controller lama
            'jenis_kelamin' => 'Laki-laki', // Data tambahan dari controller lama
            'socials' => [
                ['name' => 'GitHub', 'url' => 'https://github.com/belpythons'],
                ['name' => 'LinkedIn', 'url' => 'https://www.linkedin.com/in/belva-pranama-01048a346/'],
                ['name' => 'Twitter', 'url' => 'https://x.com/belpythons'],
                ['name' => 'Instagram', 'url' => 'https://instagram.com/belpythons'],
            ]
        ];
    }

    /**
     * Mengambil data dari config/experience.ts
     */
    private function getExperienceData()
    {
        return [
            [
                'title' => 'Asisten laboratorium',
                'company' => 'STITEK Bontang',
                'year' => '2022-2023',
                'description' => 'Bertanggung jawab atas praktikum, penjadwalan, dan dokumentasi pada saat praktikum.',
                'logo' => 'https_placeholder_com/150' // Ganti dengan path logo jika ada
            ],
            // Tambahkan pengalaman lain di sini jika ada
        ];
    }

    /**
     * Mengambil data dari config/projects.ts
     */
    private function getProjectsData()
    {
        return [
            [
                'title' => 'PERPUS - Sistem Manajemen Toko Buku',
                'description' => 'Aplikasi web toko buku dengan sistem admin untuk mengelola inventori, transaksi, dan autentikasi pengguna.',
                'tech' => ['PHP', 'MySQL', 'HTML 5', 'CSS 3', 'Javascript'],
                'link' => 'https://vigilant-increase-roy.sgp.dom.my.id/'
            ],
            [
                'title' => 'Online Learning Platform',
                'description' => 'Platform pembelajaran online (React/Node) dengan kursus gratis, roadmap karir, dan forum diskusi.',
                'tech' => ['React', 'Tailwind CSS', 'Node.js', 'express.js', 'MySQL'],
                'link' => 'https://online-learning-website-six.vercel.app/'
            ],
            [
                'title' => 'React Calculator (OOP Approach)',
                'description' => 'Aplikasi kalkulator modern menggunakan React dengan pendekatan Object-Oriented Programming (OOP).',
                'tech' => ['React', 'Javascript', 'HTML 5', 'CSS 3'],
                'link' => 'https://react-calc-ten.vercel.app/'
            ],
        ];
    }

    /**
     * Mengambil data dari config/skills.ts
     */
    private function getSkillsData()
    {
        return [
            [
                'category' => 'Bahasa Pemrograman',
                'skills' => [
                    ['name' => 'TypeScript', 'rating' => 4],
                    ['name' => 'JavaScript', 'rating' => 4],
                    ['name' => 'Python', 'rating' => 3],
                    ['name' => 'PHP', 'rating' => 3],
                ]
            ],
            [
                'category' => 'Frontend',
                'skills' => [
                    ['name' => 'Next.js', 'rating' => 5],
                    ['name' => 'React', 'rating' => 4],
                    ['name' => 'Tailwind CSS', 'rating' => 5],
                    ['name' => 'HTML', 'rating' => 5],
                    ['name' => 'CSS', 'rating' => 4],
                ]
            ],
            [
                'category' => 'Backend',
                'skills' => [
                    ['name' => 'Node.js', 'rating' => 3],
                    ['name' => 'Firebase', 'rating' => 4],
                    ['name' => 'MySQL', 'rating' => 3],
                ]
            ],
            [
                'category' => 'Tools & Lainnya',
                'skills' => [
                    ['name' => 'Git', 'rating' => 4],
                    ['name' => 'Docker', 'rating' => 2],
                    ['name' => 'Figma', 'rating' => 3],
                ]
            ],
        ];
    }

    /**
     * Mengambil data dari config/contributions.ts
     */
    private function getContributionsData()
    {
        return [
            [
                'title' => 'Perbaikan frontend di Repositori mangaphase',
                'description' => 'meningkatkan dan memperbaiki frontend pada tampilan website baca menga.',
                'url' => 'https://github.com/mangaphase',
            ],
            [
                'title' => 'Full Stack developing Proyek suvi training',
                'description' => 'memperbaiki dan memodifikasi API pada backend dan membuat tampilan pada frontend.',
                'url' => 'https://github.com/suvi-course-program',
            ],
        ];
    }

    /**
     * Helper untuk mendapatkan data dasar (profil dan navigasi)
     */
    private function getBaseData($activePage)
    {
        return [
            'profile' => $this->getProfileData(),
            'navigation' => [
                ['name' => 'Home', 'route' => 'portfolio.home', 'active' => $activePage === 'home'],
                ['name' => 'Experience', 'route' => 'portfolio.experience', 'active' => $activePage === 'experience'],
                ['name' => 'Projects', 'route' => 'portfolio.projects', 'active' => $activePage === 'projects'],
                ['name' => 'Skills', 'route' => 'portfolio.skills', 'active' => $activePage === 'skills'],
                ['name' => 'Contributions', 'route' => 'portfolio.contributions', 'active' => $activePage === 'contributions'],
            ]
        ];
    }

    /**
     * Mengambil data pendidikan (ditambahkan untuk CV)
     */
    private function getEducationData()
    {
        return [
            [
                'school' => 'STITEK Bontang',
                'degree' => 'S1 Teknik Informatika',
                'year' => '2023 - Present',
                'description' => 'Focusing on Software Engineering and Web Technologies.',
            ],
            // Add more if needed
        ];
    }

    // --- METODE UNTUK SETIAP HALAMAN ---

    public function home()
    {
        $data = $this->getBaseData('home');
        return view('portfolio', $data);
    }

    public function experience()
    {
        $data = $this->getBaseData('experience');
        $data['experiences'] = $this->getExperienceData();
        return view('experience', $data);
    }

    public function projects()
    {
        $data = $this->getBaseData('projects');
        $data['projects'] = $this->getProjectsData();
        return view('projects', $data);
    }

    public function skills()
    {
        $data = $this->getBaseData('skills');
        $data['skillCategories'] = $this->getSkillsData();
        return view('skills', $data);
    }

    public function contributions()
    {
        $data = $this->getBaseData('contributions');
        $data['contributions'] = $this->getContributionsData();
        return view('contributions', $data);
    }

    /**
     * Download ATS-Friendly Resume PDF
     */
    public function downloadCv()
    {
        $data = [
            'profile' => $this->getProfileData(),
            'experiences' => $this->getExperienceData(),
            'education' => $this->getEducationData(),
            'skills' => $this->getSkillsData(),
            'projects' => $this->getProjectsData(),
        ];

        // Ensure these extra fields exist in profile for the CV
        $data['profile']['email'] = 'belvapranamasriwibowo@gmail.com';
        $data['profile']['phone'] = '085822112870';
        $data['profile']['location'] = 'Bontang, East Kalimantan';

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.cv-ats', $data);
        return $pdf->download('Resume_Belva_Pranama.pdf');
    }
}
