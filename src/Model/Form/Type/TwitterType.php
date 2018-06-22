<?php

namespace App\Model\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class TwitterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('consumerKey', TextType::class, ['required' => true, 'label' => 'consumerKey']);
        $builder->add('consumerSecret', TextType::class, ['required' => true, 'label' => 'consumerSecret']);
        $builder->add('accessToken', TextType::class, ['required' => true, 'label' => 'accessToken']);
        $builder->add('accessTokenSecret', TextType::class, ['required' => true, 'label' => 'accessTokenSecret']);
        $builder->add('hashtags', TextType::class, ['required' => true, 'label' => 'hashtags']);
        $builder->add('numOfTweets', TextType::class, ['required' => true, 'label' => 'Number of Tweets']);
        $builder->add('submit', SubmitType::class);
    }
}
