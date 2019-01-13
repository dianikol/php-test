<?php

class ArticleTest extends \PHPUnit\Framework\TestCase
{
    private $article;

    protected function setUp()
    {
        $this->article = new App\Article();
    }

    /**
     * Title Is Empty By Default
     */
    public function testTitleIsEmptyByDefault()
    {
        $this->assertEmpty($this->article->title);
    }

    /**
     * Slug Is Empty With No Title
     */
    public function testSlugIsEmptyWithNoTitle()
    {
        $this->assertSame('', $this->article->getSlug());
    }

    public function sluggTestProvider()
    {
        return [
            'Slug Has Spaces Replaced By Underscores' => ['An Example Of Slug', 'an_example_of_slug'],
            'Slug Is In Lower Case' => ['An Example Of SLUG', 'an_example_of_slug']
        ];
    }

    /**
     * @dataProvider sluggTestProvider
     */
    public function testSlug($title, $slug)
    {
        $this->article->title = $title;

        $this->assertSame($slug,  $this->article->getSlug());
    }


}