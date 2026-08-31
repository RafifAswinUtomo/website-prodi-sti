<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_returns_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_akademik_index_returns_successful_response(): void
    {
        $response = $this->get('/akademik');

        $response->assertStatus(200);
    }

    public function test_practitioners_index_returns_successful_response(): void
    {
        $response = $this->get('/praktisi-industri');

        $response->assertStatus(200);
    }

    public function test_facilities_index_returns_successful_response(): void
    {
        $response = $this->get('/fasilitas');

        $response->assertStatus(200);
    }

    public function test_kemahasiswaan_index_returns_successful_response(): void
    {
        $response = $this->get('/kemahasiswaan');

        $response->assertStatus(200);
    }

    public function test_class_programs_index_returns_successful_response(): void
    {
        $response = $this->get('/program-kelas');

        $response->assertStatus(200);
    }

    public function test_pengumuman_index_returns_successful_response(): void
    {
        $response = $this->get('/pengumuman');

        $response->assertStatus(200);
    }

    public function test_pengumuman_lain_lain_returns_successful_response(): void
    {
        $response = $this->get('/pengumuman/lain-lain');

        $response->assertStatus(200);
    }

    public function test_pengumuman_kalender_akademik_returns_successful_response(): void
    {
        $response = $this->get('/pengumuman/kalender-akademik');

        $response->assertStatus(200);
    }

    public function test_pengumuman_wisuda_returns_successful_response(): void
    {
        $response = $this->get('/pengumuman/wisuda');

        $response->assertStatus(200);
    }

    public function test_class_programs_detail_returns_successful_response(): void
    {
        $response = $this->get('/program-kelas/reguler');

        $response->assertStatus(200);
    }

    public function test_berita_kegiatan_index_returns_successful_response(): void
    {
        $response = $this->get('/berita-kegiatan');

        $response->assertStatus(200);
    }

    public function test_unknown_route_returns_404(): void
    {
        $response = $this->get('/halaman-yang-tidak-ada');

        $response->assertStatus(404);
    }
}
