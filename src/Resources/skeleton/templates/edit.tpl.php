<?= $helper->getHead($base_layout_exists, 'Edition '.$entity_class_name); ?>


{% block stylesheets %}
    <link href="{{ asset('build/<?= strtolower($entity_class_name); ?>.css') }}" rel="stylesheet">
{% endblock %}


{% block content %}

    <div class="container-fluid">
        <!-- Content Header (Page header) -->
        <h2 class="page-content__header-heading"><?= $entity_class_name; ?></h2>

        <!-- Main content -->
        <div class="main-container">
            <h3>Edition d'une <?= strtolower($entity_class_name); ?></h3>
            <div class="row-fluid">
                {% include '<?= $route_name; ?>/_form.html.twig' with {'form': form, 'button_label': 'Edit'} only %}
                {% include '<?= $route_name; ?>/_delete_form.html.twig' with {'identifier': <?= $entity_var_singular; ?>.<?= $entity_identifier; ?>} only %}
                <div class="clear"></div>
            </div>
        </div>
    </div>

{% endblock %}