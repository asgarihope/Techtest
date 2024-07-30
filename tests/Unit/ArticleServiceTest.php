<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\ArticleService;
use App\Repository\Interfaces\ArticleRepositoryInterface;
use App\Dtos\ArticleDto;
use Illuminate\Pagination\LengthAwarePaginator;
use Mockery;
use Mockery\MockInterface;

class ArticleServiceTest extends TestCase {

	private ArticleRepositoryInterface|MockInterface $articleRepository;
	private ArticleService $articleService;

	protected function setUp(): void {
		parent::setUp();
		$this->articleRepository = Mockery::mock(ArticleRepositoryInterface::class);
		$this->articleService    = new ArticleService($this->articleRepository);
	}

	public function testCreateArticle() {
		$title   = 'Test Title';
		$content = 'Test Content';

		$articleDto = new ArticleDto(
			id: 1,
			title: $title,
			content: $content,
			createdAt: now()
		);

		$this->articleRepository
			->shouldReceive('createArticle')
			->once()
			->with($title, $content)
			->andReturn($articleDto);

		$result = $this->articleService->createArticle($title, $content);

		$this->assertInstanceOf(ArticleDto::class, $result);
		$this->assertEquals($title, $result->title);
		$this->assertEquals($content, $result->content);
	}

	public function testUpdateArticle() {
		$articleID = 1;
		$title     = 'Updated Title';
		$content   = 'Updated Content';

		$this->articleRepository
			->shouldReceive('updateBy')
			->once()
			->with('id', $articleID, ['title' => $title, 'content' => $content])
			->andReturn(true);

		$result = $this->articleService->updateArticle($articleID, $title, $content);

		$this->assertTrue($result);
	}

	public function testGetArticleByID() {
		$articleID = 1;

		$articleDto = new ArticleDto(
			id: $articleID,
			title: 'Test Title',
			content: 'Test Content',
			createdAt: now()
		);

		$this->articleRepository
			->shouldReceive('getArticleByID')
			->once()
			->with($articleID)
			->andReturn($articleDto);

		$result = $this->articleService->getArticleByID($articleID);

		$this->assertInstanceOf(ArticleDto::class, $result);
		$this->assertEquals($articleID, $result->id);
	}

	public function testGetArticles() {
		$page     = 1;
		$perPage  = 10;
		$articles = collect([new ArticleDto(
			id: 1,
			title: 'Test Title',
			content: 'Test Content',
			createdAt: now()
		)]);

		$paginator = new LengthAwarePaginator($articles, 1, $perPage, $page);

		$this->articleRepository
			->shouldReceive('getArticles')
			->once()
			->with($page, $perPage)
			->andReturn($paginator);

		$result = $this->articleService->getArticles($page, $perPage);

		$this->assertInstanceOf(LengthAwarePaginator::class, $result);
		$this->assertCount(1, $result->items());
	}

	public function testDeleteArticle() {
		$articleID = 1;

		$this->articleRepository
			->shouldReceive('deleteArticle')
			->once()
			->with($articleID)
			->andReturn(true);

		$result = $this->articleService->deleteArticle($articleID);

		$this->assertTrue($result);
	}

	protected function tearDown(): void {
		Mockery::close();
		parent::tearDown();
	}
}
