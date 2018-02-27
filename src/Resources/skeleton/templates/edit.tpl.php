<?= $helper->getHead($base_layout_exists, 'Edition '.$entity_class_name); ?>

{% block body %}

    <h1>Edition <?= $entity_class_name; ?></h1>

    {% include '<?= $route_name; ?>/_form.html.twig' with {'form': form, 'button_label': 'Edit'} only %}

    <a href="{{ path('<?= $route_name; ?>_index') }}">Retour à la liste</a>

    {% include '<?= $route_name; ?>/_delete_form.html.twig' with {'identifier': <?= $entity_var_singular; ?>.<?= $entity_identifier; ?>} only %}

{% endblock %}