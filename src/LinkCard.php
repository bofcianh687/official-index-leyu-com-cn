<?php

namespace App\Utils;

/**
 * Renders an HTML link card with safe escaping.
 */
class LinkCard
{
    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $keyword;

    /**
     * @param string $url
     * @param string $title
     * @param string $description
     * @param string $keyword
     */
    public function __construct(
        string $url = 'https://official-index-leyu.com.cn',
        string $title = '乐鱼体育',
        string $description = '乐鱼体育 — 专业体育赛事平台',
        string $keyword = '乐鱼体育'
    ) {
        $this->url = $url;
        $this->title = $title;
        $this->description = $description;
        $this->keyword = $keyword;
    }

    /**
     * Render the link card as an escaped HTML string.
     *
     * @return string
     */
    public function render(): string
    {
        $safeUrl = htmlspecialchars($this->url, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $safeTitle = htmlspecialchars($this->title, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $safeDescription = htmlspecialchars($this->description, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $safeKeyword = htmlspecialchars($this->keyword, ENT_QUOTES | ENT_HTML5, 'UTF-8');

        return <<<HTML
<div class="link-card">
    <a href="{$safeUrl}" target="_blank" rel="noopener noreferrer">
        <div class="link-card-body">
            <span class="link-card-title">{$safeTitle}</span>
            <span class="link-card-desc">{$safeDescription}</span>
            <span class="link-card-keyword">{$safeKeyword}</span>
        </div>
    </a>
</div>
HTML;
    }

    /**
     * Static factory to quickly build and render a card.
     *
     * @param string $url
     * @param string $title
     * @param string $description
     * @param string $keyword
     * @return string
     */
    public static function createAndRender(
        string $url = 'https://official-index-leyu.com.cn',
        string $title = '乐鱼体育',
        string $description = '乐鱼体育 — 专业体育赛事平台',
        string $keyword = '乐鱼体育'
    ): string {
        $card = new self($url, $title, $description, $keyword);
        return $card->render();
    }
}