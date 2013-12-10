<?php

class __Mustache_7c0c3f3db8068fa689702d052286cc48 extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '', $escape = false)
    {
        $buffer = '';

        $buffer .= $indent . '<div class="section">';
        $buffer .= "\n";
        $buffer .= $indent . '	<div class="box">';
        $buffer .= "\n";
        $buffer .= $indent . '		<div class="title">Sign In</div>';
        $buffer .= "\n";
        $buffer .= $indent . '		';
        $buffer .= "\n";
        $buffer .= $indent . '		<div class="content" style="width:auto;">';
        $buffer .= "\n";
        $buffer .= $indent . '			<form action="';
        $value = $context->find('login_post_url');
        if (!is_string($value) && is_callable($value)) {
            $value = $this->mustache
                ->loadLambda((string) call_user_func($value))
                ->renderInternal($context, $indent);
        }
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '" method="post">';
        $buffer .= "\n";
        $buffer .= $indent . '				';
        $buffer .= "\n";
        $buffer .= $indent . '				<div class="row">';
        $buffer .= "\n";
        $buffer .= $indent . '					<label for="username">Username</label>';
        $buffer .= "\n";
        $buffer .= $indent . '					';
        $buffer .= "\n";
        $buffer .= $indent . '					<div class="right">';
        $buffer .= "\n";
        $buffer .= $indent . '						<input type="text" name="username" id="username">';
        $buffer .= "\n";
        $buffer .= $indent . '					</div>';
        $buffer .= "\n";
        $buffer .= $indent . '					';
        $buffer .= "\n";
        $buffer .= $indent . '				</div>';
        $buffer .= "\n";
        $buffer .= $indent . '				';
        $buffer .= "\n";
        $buffer .= $indent . '				<div class="row">';
        $buffer .= "\n";
        $buffer .= $indent . '					<label for="password">Password</label>';
        $buffer .= "\n";
        $buffer .= $indent . '					';
        $buffer .= "\n";
        $buffer .= $indent . '					<div class="right">';
        $buffer .= "\n";
        $buffer .= $indent . '						<input type="password" name="password" id="password">';
        $buffer .= "\n";
        $buffer .= $indent . '					</div>';
        $buffer .= "\n";
        $buffer .= $indent . '					';
        $buffer .= "\n";
        $buffer .= $indent . '				</div>';
        $buffer .= "\n";
        $buffer .= $indent . '				';
        $buffer .= "\n";
        $buffer .= $indent . '				<div class="row">	';
        $buffer .= "\n";
        $buffer .= $indent . '					<div class="right">';
        $buffer .= "\n";
        $buffer .= $indent . '						<input type="hidden" name="csrf_token" value="';
        $value = $context->find('csrf_token');
        if (!is_string($value) && is_callable($value)) {
            $value = $this->mustache
                ->loadLambda((string) call_user_func($value))
                ->renderInternal($context, $indent);
        }
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '">';
        $buffer .= "\n";
        $buffer .= $indent . '						<button type="submit"><span>Sign In</span></button>';
        $buffer .= "\n";
        $buffer .= $indent . '						&nbsp;&nbsp;';
        $buffer .= "\n";
        $buffer .= $indent . '						<a href="';
        $value = $context->find('forgot_password_url');
        if (!is_string($value) && is_callable($value)) {
            $value = $this->mustache
                ->loadLambda((string) call_user_func($value))
                ->renderInternal($context, $indent);
        }
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '" class="forgot-password"><em>Forgot your password?</em></a>';
        $buffer .= "\n";
        $buffer .= $indent . '						&nbsp;|&nbsp;';
        $buffer .= "\n";
        $buffer .= $indent . '						<a href="';
        $value = $context->find('signup_url');
        if (!is_string($value) && is_callable($value)) {
            $value = $this->mustache
                ->loadLambda((string) call_user_func($value))
                ->renderInternal($context, $indent);
        }
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '" class="forgot-password"><em>Don`t have account? Sign up here</em></a>';
        $buffer .= "\n";
        $buffer .= $indent . '					</div>';
        $buffer .= "\n";
        $buffer .= $indent . '				</div>';
        $buffer .= "\n";
        $buffer .= $indent . '			</form>';
        $buffer .= "\n";
        $buffer .= $indent . '		</div>';
        $buffer .= "\n";
        $buffer .= $indent . '	</div>';
        $buffer .= "\n";
        $buffer .= $indent . '</div>';
        $buffer .= "\n";
        $buffer .= "\n";
        $buffer .= "\n";
        $buffer .= "\n";
        $buffer .= "\n";

        if ($escape) {
            return call_user_func($this->mustache->getEscape(), $buffer);
        } else {
            return $buffer;
        }
    }

}