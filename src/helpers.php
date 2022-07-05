<?php

use Illuminate\Database\Eloquent\Model;
use Filament\Tables\Actions\Action;

if (!function_exists('workflow_status_color_brihtness')) {

    function workflow_status_color_brihtness($color)
    {
        $red = hexdec(substr($color, 1, 2));
        $green = hexdec(substr($color, 3, 2));
        $blue = hexdec(substr($color, 5, 2));
        return (($red * 299) + ($green * 587) + ($blue * 114)) / 1000;
    }

}

if (!function_exists('workflow_status_color_styles')) {

    function workflow_status_color_styles($color)
    {
        $background_color = $color ?? '#cecece';
        $text_color = '#444444';
        if ($color && workflow_status_color_brihtness($color) < 200) {
            $text_color = '#ffffff';
        }
        return 'background-color: ' . $background_color . '; color: ' . $text_color . ';';
    }

}

if (!function_exists('workflow_resources_history')) {

    function workflow_resources_history()
    {
        return Action::make('workflow_history')
            ->label('History')
            ->color('success')
            ->icon('heroicon-o-adjustments')
            ->link()
            ->url(fn(Model $record) => route('filament.pages.workflow-history/{id}/{model}', ['id' => $record->id, 'model' => get_class($record)]))
            ->openUrlInNewTab();
    }

}
