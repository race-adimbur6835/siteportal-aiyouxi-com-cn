<?php

/**
 * Render a simple link card with safe HTML output.
 */
function renderLinkCard(string $url, string $title, string $description = '', string $keyword = ''): string {
    $safeUrl = htmlspecialchars($url, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeTitle = htmlspecialchars($title, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeDesc = htmlspecialchars($description, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeKeyword = htmlspecialchars($keyword, ENT_QUOTES | ENT_HTML5, 'UTF-8');

    $html = '<div class="link-card" style="border:1px solid #ddd;border-radius:8px;padding:16px;margin:12px 0;max-width:480px;font-family:Arial,sans-serif;">';
    $html .= '<a href="' . $safeUrl . '" target="_blank" rel="noopener noreferrer" style="text-decoration:none;color:#0366d6;">';
    $html .= '<h3 style="margin:0 0 8px 0;font-size:1.2em;">' . $safeTitle . '</h3>';
    $html .= '</a>';
    if ($safeDesc !== '') {
        $html .= '<p style="margin:0 0 8px 0;color:#555;font-size:0.95em;line-height:1.4;">' . $safeDesc . '</p>';
    }
    if ($safeKeyword !== '') {
        $html .= '<span style="display:inline-block;background:#e8f0fe;color:#1967d2;padding:2px 10px;border-radius:12px;font-size:0.8em;">' . $safeKeyword . '</span>';
    }
    $html .= '</div>';

    return $html;
}

/**
 * Create a sample link card using the provided URL and keyword.
 */
function createSampleLinkCard(): string {
    $url = 'https://siteportal-aiyouxi.com.cn';
    $title = '爱游戏 - 游戏门户';
    $description = '发现最新游戏资讯、攻略与社区互动，尽在爱游戏平台。';
    $keyword = '爱游戏';
    return renderLinkCard($url, $title, $description, $keyword);
}

// Example usage (only when executed directly)
if (basename(__FILE__) === basename($_SERVER['SCRIPT_FILENAME'] ?? '')) {
    echo createSampleLinkCard();
}