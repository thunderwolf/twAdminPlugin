<ul>
	<li[?php if ($pager->getPage() == 1): ?] class="disabled"[?php endif; ?]>
		<a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=1">&laquo;</a>
	</li>
	<li[?php if ($pager->getPage() == 1): ?] class="disabled"[?php endif; ?]>
		<a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getPreviousPage() ?]">&lt;</a>
	</li>
	[?php foreach ($pager->getLinks() as $page): ?]
	<li[?php if ($page == $pager->getPage()): ?] class="active"[?php endif; ?]>
		<a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $page ?]">[?php echo $page ?]</a>
	</li>
	[?php endforeach; ?]
	<li[?php if ($pager->getPage() == $pager->getLastPage()): ?] class="disabled"[?php endif; ?]>
		<a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getNextPage() ?]">&gt;</a>
	</li>
	<li[?php if ($pager->getPage() == $pager->getLastPage()): ?] class="disabled"[?php endif; ?]>
		<a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getLastPage() ?]">&raquo;</a>
	</li>
</ul>
