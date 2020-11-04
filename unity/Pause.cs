using System;
using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Pause : MonoBehaviour
{
    [SerializeField] private GameObject player;
    [SerializeField] private GameObject pauseMenu;
    private bool paused = false;

    private void Update()
    {
        if (Input.GetKeyDown(KeyCode.Escape))
        {
            if (!paused)
            {
                Pause();
            }
            else
            {
                Resume();
            }
        }
    }

    public void Pause()
    {
        Cursor.lockState = CursorLockMode.Locked; //lock le cursor
        Cursor.visible = false ; //cache ou non le curseur
        player.SetActive(false);
        pauseMenu.SetActive(true);
        paused = true;
    }

    public void Resume()
    {
        Cursor.lockState = CursorLockMode.None; //unlock le cursor
        Cursor.visible = true;
        player.SetActive(true);
        pauseMenu.SetActive(false);
        paused = false;
    }

    public void Quit()
    {
        #if UNITY_EDITOR
            UnityEditor . EditorApplication . isPlaying = false ;
        #else
            Application.Quit();
        #endif
    }


}
