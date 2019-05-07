<div class="shop-control-bar-bottom">
        <p class="woocommerce-result-count">{% set start = (limit * (page.current - 1)) + 1 %}
                                                            {% set end = (limit * (page.current-1)) + limit %}
                                                            {% if end > page.total_items %}
                                                              {% set end = page.total_items %}
                                                            {% endif %}

                                                            {% if limit %}
                                                              Showing {{ start }} - {{ end  }} of {{ page.total_items }}
                                                            {% endif %} results</p>
        <nav class="woocommerce-pagination">
            <ul class="page-numbers">
                {% if page.current != 1 %}
                    <!--<li><a href="{{ paginationPath() }}1" class="page-numbers">&laquo;</a></li>-->
                  {% endif %}

                  {% for i in 1..page.total_pages %}
                    <li><a {% if i == page.current %}class="page-numbers current" href="#"{% endif %} href="{{ paginationPath() }}{{ i }}"  class="page-numbers">{{ i }}</a></li>
                  {% endfor %}

                  {% if page.current != page.last %}
                    <!-- <li><a href="{{ paginationPath() }}{{ page.last }}" class="next page-numbers">&raquo;</a></li> -->
                  {% endif %}
                <!--<li><span class="page-numbers current">1</span></li>
                <li><a href="#" class="page-numbers">2</a></li>
                <li><a href="#" class="next page-numbers">→</a></li>-->
            </ul>
        </nav>
    </div>
