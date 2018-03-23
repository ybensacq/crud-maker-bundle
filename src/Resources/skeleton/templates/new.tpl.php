<?= $helper->getHead($base_layout_exists, 'Nouveau '.$entity_class_name); ?>

{% block stylesheets %}
    <link href="{{ asset('build/<?= strtolower($entity_class_name); ?>.css') }}" rel="stylesheet">
{% endblock %}

{% block content %}

    <div class="container-fluid">
        <div class="page-content__header">
            <div>
                <h2 class="page-content__header-heading">Création d'une <?= strtolower($entity_class_name); ?></h2>
            </div>
        </div>

        <div class="main-container">
            {% include 'structure/_form.html.twig' with {'form': form, 'button_label': 'Edit'} only %}
        </div>
    </div>

{% endblock %}