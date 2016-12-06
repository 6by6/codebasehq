<?php

namespace SixBySix\CodebaseHq\Entity\Event;

use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use SixBySix\CodebaseHq\Entity\Event;

class Comment extends Event
{
    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("content")
     */
    protected $content;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("commit-ref")
     */
    protected $commitRef;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("repository-permalink")
     */
    protected $repositoryPermalink;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("project-permalink")
     */
    protected $projectPermalink;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("project-name")
     */
    protected $projectName;
}