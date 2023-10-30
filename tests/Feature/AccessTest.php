<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
// Model読込
use App\Models\User;
use App\Models\Applicant;

class AccessTest extends TestCase
{
    use RefreshDatabase;

    // Seeding実行
    public function setUp(): void
    {
        parent::setUP();

        // seeding実行
        $this->artisan('db:seed');

        // 応募データを作成
        Applicant::factory()->create([
            'user_id' => '1',
            'job_id' => '1',
            'name' => 'test',
            'email' => 'test@test.com',
            'image' => 'images/Xp9YWBn9Wat6NdKSJMzk5PUpdUQYRKOVwAIYnDR4.jpg',
            'gender' => '男性',
            'age' => '28',
            'tel' => '01011112222',
            'postcode' => '111-1111',
            'address' => 'test',
            'building' => 'test',
            'appeal' => 'test',
            'reason' => 'test',
            'experience' => 'test',
            'question' => 'test',
        ]);

        // login
        $user = User::find(1);
        $this->actingAs($user);
    }
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        /* ==================================================
        アクセステストの実施
        ================================================== */
        // view表示：新規登録ページ
        $response = $this->get('/register');
        $response->assertStatus(200);

        // view表示：ログインページ
        $response = $this->get('/login');
        $response->assertStatus(200);

        // view表示：認証メール送信済ページ
        $response = $this->get('/verify/email');
        $response->assertStatus(200);

        // view表示：トップページ
        $response = $this->get('/');
        $response->assertStatus(200);

        // view表示：求人一覧ページ
        $response = $this->get('/jobs');
        $response->assertStatus(200);

        // view表示：求人詳細ページ
        $response = $this->get('/job/detail/1');
        $response->assertStatus(200);

        // view表示：マイページ
        $response = $this->get('/mypage');
        $response->assertStatus(200);

        // view表示：メインページ
        $response = $this->get('/company');
        $response->assertStatus(200);

        // view表示：求人詳細ページ(店舗側)
        $response = $this->get('/company/detail/1');
        $response->assertStatus(200);

        // view表示：求人詳細修正ページ
        $response = $this->get('/company/detail/1/edit');
        $response->assertStatus(200);

        // view表示：求人作成ページ
        $response = $this->get('/company/create');
        $response->assertStatus(200);

        // view表示：応募詳細ページ
        $response = $this->get('/company/list/1');
        $response->assertStatus(200);
        
        // ログアウト確認
        $this->get('/logout');
        $this->assertNull(session('user'));
    }
}
