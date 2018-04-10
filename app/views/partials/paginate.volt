<div class="col-md-12 text-center">
    {%- if (bootstrapOptions is not defined) -%}
        {%- set bootstrapOptions = [] -%}
    {%- endif -%}

    {%- if pager.haveToPaginate() -%}
        {{- pager.getLayout().getRendered(bootstrapOptions) -}}
    {%- endif -%}
</div>
