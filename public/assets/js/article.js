$(document).ready(function () {
    let page = 1;
    const perPage = 10;
    let isLoading = false;
    let hasMorePages = true;

    function loadArticles() {
        if (isLoading || !hasMorePages) return;

        isLoading = true;
        $('#loading').show();
        $.ajax({
            url: `/api/articles`,
            method: 'GET',
            data: {
                page: page,
                per_page: perPage
            },
            success: function (response) {
                const articles = response.data;
                articles.forEach(article => {
                    $('#article-list').append(
                        `<li>
                                    <div class="card mb-3">
                                      <div class="card-header"><strong>${article.title}</strong> <small>(${article.published_at})</small></div>
                                      <div class="card-body">${article.short_content}</div>
                                      <div class="text-end">
                                           <button class="btn-details btn btn-link" data-id="${article.id}">Show More</div>
                                      </div>
                                    </div>
                                </li>`
                    );
                });

                if (response.current_page >= response.last_page) {
                    $('#load-more').hide();
                } else {
                    page++;
                }
            },
            error: function () {
                alert('Failed to load articles.');
            },
            complete: function () {
                isLoading = false;
                $('#loading').hide();
            }
        });
    }

    let debounceTimer;

    $(window).on('scroll', function () {
        if (debounceTimer) {
            clearTimeout(debounceTimer);
        }
        debounceTimer = setTimeout(() => {
            if ($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
                loadArticles();
            }
        }, 100);
    });


    loadArticles();


    $(document).on('click', '.btn-details', function () {
        const articleId = $(this).data('id');
        $.ajax({
            url: `/api/articles/${articleId}`,
            method: 'GET',
            success: function (response) {
                $('#modal-title').text(response.data.title);
                $('#modal-date').text(response.data.published_at);
                $('#modal-content').text(response.data.content);
               (new bootstrap.Modal($('#article-modal'), {})).show();
            },
            error: function () {
                alert('Failed to load article details.');
            }
        });
    });
});
